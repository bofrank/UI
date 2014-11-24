$nflcs.gameStatusStrip = {

    init: function(elem){

        function initialCDSRequest(data)
        {
            // If Game State is indicated in URL, override json to force the state
            var testGameState;

            //Check for null score
            if( !data.score )
            {
                data.score = {"phase" : "PREGAME"};
            }

            var query = window.location.search.substring(1);
            var vars = query.split("&");
            for (var i=0;i<vars.length;i++) {
                   var pair = vars[i].split("=");
                   if(pair[0] == "gameStatusState")
                        testGameState = pair[1];
            }

            if(testGameState)
            {
                //Convert to CDS compatible game state
                switch(testGameState.toUpperCase())
                {
                    case "PRE" :
                        data.score.phase = "PREGAME";
                        break;
                    case "IN" :
                        data.score.phase = "HALFTIME"; //Could be anything other than PREGAME and FINAL/FINAL_OVERTIME
                        break;
                    case "POST" :
                        data.score.phase = "FINAL";
                        break;
                }
            }
            if( data.score.phase )
            {
                switch(data.score.phase)
                {
                    case "PREGAME" :
                        $nflcs(elem).addClass("pre");
                        break;
                    case "FINAL" :
                    case "FINAL_OVERTIME" :
                        $nflcs(elem).addClass("post");
                        break;
                    default :
                        $nflcs(elem).addClass("in");
                }
            }

            data.clubcode = $nflcs(elem).data("clubcode");
            data.visitorClubDisplayName = data.gameSchedule.visitorTeamAbbr;
            data.homeClubDisplayName = data.gameSchedule.homeTeamAbbr;
            $nflcs.gameStatusStrip.load(elem, data);

        }

        var url = $nflcs(elem).data("scoresurl");

        //Initial CDS scores request
        $nflcs.xDomainRequest({
            url: url,
            dataType: "json",
            success: function(data){
                initialCDSRequest(data);
            }
        });
    },

    load: function(elem, data)
    {
        var template,
            liveScoreFeedInterval = 10000;

        if( $nflcs(elem).outerWidth() <= 310 )
        {
            $nflcs(elem).addClass("onecol");
            template = Handlebars.compile( $nflcs('#game-status-strip-onecol').html() );
        }
        else
        {
            $nflcs(elem).addClass("multicol");

            if( $nflcs(elem).outerWidth() <= 680 ) /* largest 2-column - Raiders */
            {
                $nflcs(elem).addClass("twocol");
            }
            else if( $nflcs(elem).outerWidth() <= 990 ) /* largest 3-column - Raiders */
            {
                $nflcs(elem).addClass("threecol");
                data.visitorClubDisplayName = $nflcs(elem).data("visitorclubdisplayname");
                data.homeClubDisplayName = $nflcs(elem).data("homeclubdisplayname");

            }

            template = Handlebars.compile( $nflcs('#game-status-strip-multicol').html() );
        }

        // Handlebars Helpers

        Handlebars.registerHelper('isPreGame', function() {
            if( this.score.phase == "PREGAME" )
                return true;
        });

        Handlebars.registerHelper('isInGame', function() {
            if( this.score.phase != "PREGAME" && this.score.phase != "FINAL" && this.score.phase != "FINAL_OVERTIME" )
                return true;
        });

        Handlebars.registerHelper('isPostGame', function() {
            if( this.score.phase == "FINAL" || this.score.phase == "FINAL_OVERTIME" )
                return true;
        });

        Handlebars.registerHelper('getBroadcastCharacterMap', function(network) {
            switch(network){
                case "FOX":
                    return ")";
                case "CBS":
                    return "*";
                case "NBC":
                    return "'";
                case "ESPN":
                    return "+";
                case "NFL NETWORK":
                    return ",";
            }
        });

        Handlebars.registerHelper('calcResult', function(teamAbbr) {
            //Are we home team?
            if( teamAbbr == this.gameSchedule.homeTeamAbbr )
            {
                if( this.score.homeTeamScore.pointTotal > this.score.visitorTeamScore.pointTotal )
                    return "WIN";
                else if( this.score.homeTeamScore.pointTotal < this.score.visitorTeamScore.pointTotal )
                    return "LOSS";
                else
                    return "TIE";
            }
            else if( teamAbbr == this.gameSchedule.visitorTeamAbbr )
            {
                if( this.score.homeTeamScore.pointTotal < this.score.visitorTeamScore.pointTotal )
                    return "WIN";
                else if( this.score.homeTeamScore.pointTotal > this.score.visitorTeamScore.pointTotal )
                    return "LOSS";
                else
                    return "TIE";
            }
            else
                return false;
        });

        Handlebars.registerHelper('awayHasBall', function() {
            return this.score.possessionTeamAbbr == this.gameSchedule.visitorTeamAbbr;
        });

        Handlebars.registerHelper('homeHasBall', function() {
            return this.score.possessionTeamAbbr == this.gameSchedule.homeTeamAbbr;
        });

        Handlebars.registerHelper('getGameActionLinkCharacterMap', function(linkIcon) {
            switch(linkIcon){
                case "photo":
                    return "C";
                case "video":
                    return "V";
                case "audio":
                    return "A";
                case "article":
                    return "B";
            }
        });

        Handlebars.registerHelper('isNotNull', function(value, options) {
            return (value != null) ? options.fn(this) : options.inverse(this);
        });

        Handlebars.registerHelper('showTimeBasedOnPhase', function() {
            //Don't show time at halftime.  Also, this function won't be called in pre or post states, so we don't need to check for those.
            if( this.score.phase != "HALFTIME" )
                return this.score.time;
        });

        Handlebars.registerHelper('isAway', function(options) {
            if( this.clubcode == this.gameSchedule.visitorTeamAbbr )
                return options.fn(this);
        });

        Handlebars.registerHelper('getOpponentClubCode', function() {
            if( this.clubcode == this.gameSchedule.homeTeamAbbr )
                return this.gameSchedule.visitorTeamAbbr;
            else
                return this.gameSchedule.homeTeamAbbr;
        });

        Handlebars.registerHelper('getOpponentClubDisplayName', function() {
            if( this.clubcode == this.gameSchedule.homeTeamAbbr )
                return this.visitorClubDisplayName;
            else
                return this.homeClubDisplayName;
        });

        Handlebars.registerHelper('getFormattedDown', function(downNumber) {
            switch(downNumber)
            {
                case 1:
                    return "1ST";
                    break;
                case 2:
                    return "2ND";
                    break;
                case 3:
                    return "3RD";
                    break;
                case 4:
                    return "4TH";
                    break;

            }
        });

        function livePoll(newdata)
        {
            //Copy in the new data into existing data json because the original contains additional fields that we don't want to lose
            data.gameSchedule = newdata.gameSchedule;
            data.score = newdata.score;

            $nflcs(".bd", elem).html(template(data));

            if( data.score.phase.toUpperCase() == "FINAL" || data.score.phase.toUpperCase() == "FINAL_OVERTIME" )
            {
                $nflcs(elem).removeClass("in");
                $nflcs(elem).addClass("post");
                clearInterval(intervalId);
            }
        }

        Handlebars.registerPartial("datetimestatus", $("#game-status-strip-datetimestatus-partial").html());
        Handlebars.registerPartial("teamwrapper", $("#game-status-strip-teamwrapper-partial").html());
        Handlebars.registerPartial("gameactionlink", $("#game-status-strip-gameactionlink-partial").html());
        Handlebars.registerPartial("gameday", $("#game-status-strip-gameday-partial").html());
        Handlebars.registerPartial("sponsor", $("#game-status-strip-sponsor-partial").html());
        Handlebars.registerPartial("links", $("#game-status-strip-links-partial").html());

        $nflcs(".bd", elem).html(template(data));

        //if light version, "a" tag has default link color
        if( $nflcs(elem).hasClass("light") )
        {
            var defaultLinkColor = $nflcs("a").css("color");

            if( defaultLinkColor )
                $nflcs(".bd .links", elem).css("color", defaultLinkColor);
        }

        //if IN State
        if( data.score.phase.toUpperCase() != "PREGAME" && data.score.phase.toUpperCase() != "FINAL" && data.score.phase.toUpperCase() != "FINAL_OVERTIME")
        {
            var intervalId,
                url = $nflcs(elem).data("scoresurl");

            if (window.XDomainRequest)
            {
                intervalId = setInterval(function(){
                    var xdr = new XDomainRequest();
                    xdr.open("get", url);
                    xdr.onload = function() {
                        livePoll($nflcs.parseJSON(xdr.responseText));
                    };
                    xdr.send();
                }, liveScoreFeedInterval);
            }
            else
            {
                intervalId = setInterval(function(){
                    $nflcs.ajax({
                        url: url,
                        dataType: "json",
                        success: function(newdata){
                            livePoll(newdata);
                        }
                    });
                }, liveScoreFeedInterval);
            }
        }
    }

};