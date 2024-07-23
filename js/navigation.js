var unExposed = unExposed || {},
    $ = jQuery;

var $doc = $( document ),
    $win = $( window ),
    winHeight = $win.height(),
    winWidth = $win.width();

var viewport = {};
viewport.top = $win.scrollTop();
viewport.bottom = viewport.top + $win.height();

function unExposedToggleAttribute( $element, attribute, trueVal, falseVal ) {
    if ( typeof trueVal === 'undefined' ) { trueVal = true; }
    if ( typeof falseVal === 'undefined' ) { falseVal = false; }

    if ( $element.attr( attribute ) !== trueVal ) {
        $element.attr( attribute, trueVal );
    } else {
        $element.attr( attribute, falseVal );
    }
}

unExposed.toggles = {
    init: function() {
        unExposed.toggles.toggle();
        unExposed.toggles.resizeCheck();
        unExposed.toggles.untoggleOnEscapeKeyPress();
    },
    toggle: function() {
        $( '*[data-toggle-target]' ).on( 'click', function( e ) {
            var $toggle = $( this ),
                targetString = $( this ).data( 'toggle-target' ),
                $target;

            if ( targetString == 'next' ) {
                $target = $toggle.next();
            } else {
                $target = $( targetString );
            }

            if ( $target.is( '.active' ) ) {
                $target.trigger( 'toggle-target-before-active' );
            } else {
                $target.trigger( 'toggle-target-before-inactive' );
            }

            var classToToggle = $toggle.data( 'class-to-toggle' ) ? $toggle.data( 'class-to-toggle' ) : 'active';
            var timeOutTime = $target.hasClass( 'cover-modal' ) ? 10 : 0;

            setTimeout( function() {
                if ( $toggle.data( 'toggle-type' ) == 'slidetoggle' ) {
                    var duration = $toggle.data( 'toggle-duration' ) ? $toggle.data( 'toggle-duration' ) : 250;
                    $target.slideToggle( duration );
                } else {
                    $target.toggleClass( classToToggle );
                }

                if ( targetString == 'next' ) {
                    $toggle.toggleClass( 'active' );
                } else {
                    $( '*[data-toggle-target="' + targetString + '"]' ).toggleClass( 'active' );
                }

                unExposedToggleAttribute( $target, 'aria-expanded', 'true', 'false' );
                unExposedToggleAttribute( $toggle, 'aria-pressed', 'true', 'false' );

                if ( $toggle.data( 'toggle-body-class' ) ) {
                    $( 'body' ).toggleClass( $toggle.data( 'toggle-body-class' ) );
                }

                if ( $toggle.data( 'lock-screen' ) ) {
                    unExposed.scrollLock.setTo( true );
                } else if ( $toggle.data( 'unlock-screen' ) ) {
                    unExposed.scrollLock.setTo( false );
                } else if ( $toggle.data( 'toggle-screen-lock' ) ) {
                    unExposed.scrollLock.setTo();
                }

                if ( $toggle.data( 'set-focus' ) ) {
                    var $focusElement = $( $toggle.data( 'set-focus' ) );
                    if ( $focusElement.length ) {
                        if ( $toggle.is( '.active' ) ) {
                            $focusElement.focus();
                        } else {
                            $focusElement.blur();
                        }
                    }
                }

                $target.triggerHandler( 'toggled' );

                if ( $target.is( '.active' ) ) {
                    $target.trigger( 'toggle-target-after-active' );
                } else {
                    $target.trigger( 'toggle-target-after-inactive' );
                }

            }, timeOutTime );

            return false;

        } );
    },
    resizeCheck: function() {
        if ( $( '*[data-untoggle-above], *[data-untoggle-below], *[data-toggle-above], *[data-toggle-below]' ).length ) {
            $win.on( 'resize', function() {
                var winWidth = $win.width(),
                    $toggles = $( '.toggle' );

                $toggles.each( function() {
                    var $toggle = $( this ),
                        unToggleAbove = $toggle.data( 'untoggle-above' ),
                        unToggleBelow = $toggle.data( 'untoggle-below' ),
                        toggleAbove = $toggle.data( 'toggle-above' ),
                        toggleBelow = $toggle.data( 'toggle-below' );

                    if ( ! unToggleAbove && ! unToggleBelow && ! toggleAbove && ! toggleBelow ) {
                        return;
                    }

                    if ( 
                        ( ( ( unToggleAbove && winWidth > unToggleAbove ) ||
                        ( unToggleBelow && winWidth < unToggleBelow ) ) &&
                        $toggle.hasClass( 'active' ) )
                        ||
                        ( ( ( toggleAbove && winWidth > toggleAbove ) ||
                        ( toggleBelow && winWidth < toggleBelow ) ) &&
                        ! $toggle.hasClass( 'active' ) )
                    ) {
                        $toggle.trigger( 'click' );
                    }

                } );

            } );

        }

    },
    untoggleOnEscapeKeyPress: function() {
        $doc.keyup( function( e ) {
            if ( e.key === "Escape" ) {
                $( '*[data-untoggle-on-escape].active' ).each( function() {
                    if ( $( this ).hasClass( 'active' ) ) {
                        $( this ).trigger( 'click' );
                    }
                } );
                    
            }
        } );

    },
};

unExposed.coverModals = {
    init: function () {
        if ($('.cover-modal').length) {
            this.onToggle();
            this.outsideUntoggle();
            this.closeOnEscape();
            this.showOnLoadandClick();
            this.hideAndShowModals();
            this.focusLoop();
            this.dropdownFocus();
        }
    },
    onToggle: function () {
        $('.cover-modal').on('toggled', function () {
            const $modal = $(this),
                $body = $('body');

            if ($modal.hasClass('active')) {
                $body.addClass('showing-modal');
            } else {
                $body.removeClass('showing-modal').addClass('hiding-modal');
                setTimeout(function () {
                    $body.removeClass('hiding-modal');
                }, 500);
            }
        });
    },
    outsideUntoggle: function () {
        $doc.on('click', function (e) {
            const $target = $(e.target),
                modal = '.cover-modal.active';

            if ($target.is(modal)) {
                unExposed.coverModals.untoggleModal($target);
            }
        });
    },
    closeOnEscape: function () {
        $doc.keyup(function (e) {
            if (e.key === "Escape") {
                $('.cover-modal.active').each(function () {
                    unExposed.coverModals.untoggleModal($(this));
                });
            }
        });
    },
    showOnLoadandClick: function () {
        const key = 'modal';

        if (window.location.search.indexOf(key) !== -1) {
            const modalTargetString = getQueryStringValue(key),
                $modalTarget = $('#' + modalTargetString + '-modal');

            if (modalTargetString && $modalTarget.length) {
                setTimeout(function () {
                    $modalTarget.addClass('active').trigger('toggled');
                }, 250);
            }
        }

        $('a').on('click', function () {
            let modalTargetString = $(this).attr('href');

            if (modalTargetString && modalTargetString.indexOf(key) !== -1) {
                modalTargetString = modalTargetString.split(key + '=')[1].split('&')[0];
                const $modalTarget = $('#' + modalTargetString + '-modal');

                if (modalTargetString && $modalTarget.length) {
                    setTimeout(function () {
                        $modalTarget.addClass('active').trigger('toggled');
                    }, 250);
                }
            }
        });
    },
    hideAndShowModals: function () {
        const $modals = $('.cover-modal');

        $modals.on('toggle-target-before-inactive', function (e) {
            if (e.target !== this) return;

            $(this).addClass('show-modal');
        });

        $modals.on('toggle-target-after-inactive', function (e) {
            if (e.target !== this) return;

            const $modal = $(this);
            setTimeout(function () {
                $modal.removeClass('show-modal');
            }, 500);
        });
    },
    untoggleModal: function ($modal) {
        $modal.removeClass('active').trigger('toggled');
    },
    focusLoop: function () {
        $(document).on('focus', 'input, a, button', function () {
            if ($('.menu-modal').hasClass('active') && !$(this).closest('.menu-modal').length) {
                $('.nav-toggle a').focus();
            } else if ($('.search-modal').hasClass('active') && !$(this).closest('.search-modal').length) {
                $('.search-modal .search-field').focus();
            }
        });
    },
    dropdownFocus: function () {
        $(document).on('focus blur', '.dropdown-menu a', function (e) {
            $(this).closest('li.menu-item-has-children').toggleClass('focus', e.type === 'focus');
        });
    }
};
unExposed.scrollLock = {
    setTo: function( lock = null ) {
        var $html = $( 'html' );

        if ( lock !== null ) {
            if ( lock ) {
                $html.addClass( 'scroll-locked' );
            } else {
                $html.removeClass( 'scroll-locked' );
            }
        } else {
            $html.toggleClass( 'scroll-locked' );
        }
    }
};

function getQueryStringValue (key) {  
    return decodeURIComponent( window.location.search.replace( new RegExp( "^(?:.*[&\\?]" + encodeURIComponent( key ).replace( /[.+*]/g, "\\$&" ) + "(?:\\=([^&]*))?)?.*$", "i" ), "$1" ) );
}

$doc.ready( function() {
    unExposed.toggles.init();
    unExposed.coverModals.init();
} );

$win.on( 'load', function() {
    unExposed.coverModals.showOnLoadandClick();
} );