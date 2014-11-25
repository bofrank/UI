/**
 * Polls Widget. Allows a user to vote on a question and
 * view the current results. The results replace the poll
 * question content.
 *
 * @return Void
 */
$nflcs.ns('nflcs.gbl.mod.Polls', {
    /**
     * Init the Polls functionality
     */
    load: function() {
        nflcs.gbl.mod.Polls.addFormEvents();
    },
    addFormEvents: function() {
        /**
         * Sets up the polls functionality
         * and changes the display of the poll widget
         * to display the current polls results when
         * a user votes
         *
         * @param i Int
         * @param pollbd Object - the element eg div.bd
         */
        $nflcs('.module .polls .bd').each(function(i, pollbd) {
            //hide the results so the user does not see them
            $nflcs(pollbd).find('.block-results').hide();
            $nflcs(pollbd).find('.block-confirm').hide();
            $nflcs(pollbd).find('.block-poll').hide();

            //evals the json properties that are stored in the rel attribute
            var properties = eval('(' + $nflcs(pollbd).attr('rel') + ')');
            properties.hasVoted = $nflcs.cookie('nflcspoll_' + properties.pollId);

            //console.log(properties);
            //console.log('mode='+properties.mode);
            //console.log('showresults='+properties.showresult);
            //console.log('isPollClosed'+properties.isPollClosed);
            //console.log('votingFreq'+properties.votingFreq);
            //console.log('pollId'+properties.pollId);

            // Display Logic
            switch(properties.mode) {
                case 'results':
                    $nflcs(pollbd).find('.block-results').show();
                    break;
                case 'confirm':
                    $nflcs(pollbd).find('.block-confirm').show();
                    break;
                default:
                    if( (properties.isPollClosed) ||
                        (properties.hasVoted && properties.showresult)
                        ) {
                        $nflcs(pollbd).find('.block-results').show();
                    } else if(properties.hasVoted) {
                        $nflcs(pollbd).find('.block-confirm').show();
                    } else {
                        $nflcs(pollbd).find('.block-poll').show();

                        //console.log('a');
                        var $pollForm = $nflcs(pollbd).find('.block-poll form');
                        //console.log('b');
                        //console.log($pollForm);
                        //console.log('c');
                        $pollForm.data('updateCallback', nflcs.gbl.mod.Polls.addFormEvents);
                        $pollForm.bind('submit', nflcs.gbl.pollsModuleUpdate);
                        $pollForm.find('button').bind('click', function() {
                            switch( properties.votingFreq ) {
                                case 'OnePerPeriod':
                                case 'Unlimited':
                                    // Don't set
                                    break;

                                case 'OnePerSession':
                                    $nflcs.cookie('nflcspoll_' + properties.pollId, true, {'path': '/'});
                                    break;

                                case 'Unspecified':
                                case 'OnePerCookie':
                                    $nflcs.cookie('nflcspoll_' + properties.pollId, true, {'path': '/', 'expires': 365});
                                    break;
                            }

                            $pollForm.trigger('submit');
                            return(false);
                        } );

                    }
                    break;
            }

        });

        /**
         * Set the height of the outer parent containing <div>
         */
        $nflcs(".polls").parent().parent().parent().css('height', 'auto');

    }
});