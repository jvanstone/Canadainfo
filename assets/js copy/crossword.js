
var grid = [
	[ 0,	0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', 0 ],
	[ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', 0 ],
	[ 0, 0, 0, 0, 0, 0, 0, '2', '2', '2', '2', '2', '2', '2', '1', '2', 0 ],
	[ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', 0 ],
	[ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1', 0 ],
	[ 0, 0, 0, 0, 0, 0, 0, 0, 0, '3', '3', '3', '3', '1,3', '3', 0, 0 ],
	[ 0, '4', 0, 0, 0, 0, '5', 0, '', 0, 0, 0, 0, 0, '1', 0 ],
	[ '6', '4,6', '6', '6', '6', '6', '5,6', '6', '6', '6', '6', '6', '6', '6', '1,6', '6', '6' ],
	[ 0, '4', 0, 0, 0, 0, '5', 0, 0, 0, 0, 0, 0, 0, '1', 0 ],
	[ 0, '4', 0, 0, 0, 0, '5', 0, 0, '8', 0, 0, 0, 0, '1', 0 ],
	[ 0, '4', 0, 0, 0, '7', '5,7', '5', '5', '5,8', '5', '5', 0, '9', '1', 0 ],
	[ 0, '4', 0, 0, 0, 0, '5', 0, 0, '8', 0, 0, 0, '9', 0, 0, 0, 0, 0, 0 ],
	[ 0, 0, 0, 0, 0, 0, '5', 0, 0, '8', 0, '10', 0, '9', 0, 0, '11', 0, 0, '12' ],
	[ 0, 0, 0, 0, 0, 0, '5', 0, '13', '8,13', '13', '10,13', '13', '13', '9,13', '13', '11,13', '13', 0, '12', 0, '14' ],
	[ 0, 0, 0, 0, 0, 0, 0, 0, 0, '8', 0, '10', 0, '9', 0, 0, '11', 0, 0, '12', 0, '14' ],
	[ 0, 0, 0, 0, 0, 0, 0, 0, 0, '8', 0, '10', 0, '9', 0, 0, '11', 0, 0, '12', 0, '14' ],
	[ 0, 0, 0, 0, 0, 0, 0, '15', '15', '8,15', '15', '10,15', '15', '9', 0, 0, '11', 0, 0, '12,16', '16', '14,16' ],
	[ 0, 0, 0, 0, 0, 0, 0, 0, 0, '8', 0, '10', 0, 0, 0, 0, '11', 0, 0, '12' ],
	[ 0, 0, 0, 0, 0, 0, 0, 0, 0, '8', 0, '10', 0, 0, '17', '17', '11,17', '17', '17', '12,17' ],
	[ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '11', 0, 0, '12' ],
	[ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '11', 0, 0, 0 ],
	[ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 ]
];

var clues = [
	'American bordering waterfall',
	'Which holiday falls on July 1st?',
	'Capital city of Canada',
	'Ice skating sport',
	'Castle located in Toronto',
	'The first hockey team',
	'What is made from fries, gravy, and cheese',
	'Hockey player turned coffee maker',
	'What is the major language spoken in Canada?',
	'What is the center of the Canadian flag?',
	'Canada federal police',
	'What is the highest mountain in Canada',
	'Reynolds Canadian Deadpool actor',
	'What is our dollar coin called',
	'How many Provinces in Canada',
	'Dam making mammal'
];

var answers = [
	'NiagraFalls', //1
	'CanadaDay', //2
	'Ottawa', //3
	'Hockey', //4
	'CasaLoma', //5
	'MontrealCanadians', //6
	'Poutine', //7
	'TimHorton', //8
	'CNTower', //9
	'English', //10
	'MapleLeaf', //11
	'Mounties', //12
	'MountLogan', //13
	'Ryan', //14
	'Loonie', //15
	'Ten', //16
	'Beaver' //17
];


/***********
 *
 * Create the Grid
 *
*/

$.each( grid, function( i, j ) {

	/* Set-up Variables */
	var row = $( '<tr></tr>' );
	var questionNumber  = String( grid[i][j]).split( ',' );
	var startingNumber  = '';
	var questionNumberSpan  = '';
	var k = 0;


	$.each( this, function( j ) {
		if ( 0 == this ) {
			$( row ).append( '<td class="square empty"></td>' );
		} else {

			for ( k ; k < questionNumber .length; k++ ) {

				if ( 'horizontal' == direction && startPos[0] == i && startPos[1] == j ) {
					startingNumber  +=  questionNumber [k] + ',';
				} else if ( 'vertical' == direction && startPos[0] == j && startPos[1] == i ) {
					startingNumber  += questionNumber [k] + ',';
				}

			}
			if ( '' != startingNumber ) {
				questionNumberSpan = '<span class="questionNumber">' + startingNumber.replace( /(^,)|(,$)/g, '' ) + '</span>';
			}

			$( row ).append( '<td>' + questionNumberSpan + '<div class="square letter" data-number="' + this + '" contenteditable="true"></div></td>' );
		}
	});
	$( '#puzzle' ).append( row );
});

//Draw hints

$.each( clues, function( index ) {

	var verticalHints = $( '<div id="vertical_hints"></div>' );
	var horizontalHints = $( '<div id="horizontal_hints"></div>' );
	var direction = getDirection( index + 1 );

	if ( 'horizontal' == direction ) {
		$( horizontalHints ).append( '<div class="hint"><b>' + ( index + 1 ) + '</b>. ' + clues[index] + '</hint>' );
	} else if ( 'vertical' == direction ) {
		$( verticalHints ).append( '<div class="hint"><b>' + ( index + 1 ) + '</b>. ' + clues[index] + '</hint>' );
	}
});
$( '#vertical_hints_container' ).append( verticalHints );
$( '#horizontal_hints_container' ).append( horizontalHints );

$( '.letter' ).keyup( function() {
	var thisText = $( this ).text();
	if ( 1 < thisText.length ) {
		$( this ).text( thisText.slice( 0, 1 ) );
	}
});

$( '.letter' ).click( function() {
	var questionNumbers = String( $( this ).data( 'number' ) ).split( ',' );

	document.execCommand( 'selectAll', false, null );

	$( '.letter' ).removeClass( 'active' );
	$( this ).addClass( 'active' );

	$( '.hint' ).css( 'color', 'initial' );

	$.each( questionNumbers, function() {
		$( '#hints .hint:nth-child(' + this + ')' ).css( 'color', 'red' );
	});
});

$( '#solve' ).click( function() {
	var questionNumbers = String( $( '.letter.active' ).data( 'number' ) ).split( ',' );

	if ( ! $( '.letter.active' ).length ) {
		return;
	}
	$.each( questionNumbers, function() {
		fillAnswer( this );
	});
});

$( '#clear_all' ).click( function() {
	var questionNumbers = String( $( '.letter.active' ).data( 'number' ) ).split( ',' );

	if ( ! $( '.letter.active' ).length ) {
		return;
	}
	$.each( questionNumbers, function() {
		clearAnswer( this );
	});
});

$( '#check' ).click( function() {
	var i = 0;

	$( '#puzzle td div' ).css( 'color', 'initial' );
	for ( i; i < answers.length; i++ ) {
		checkAnswer( i + 1 );
	}
});

$( '#clue' ).click( function() {
	var questionNumbers = String( $( '.letter.active' ).data( 'number' ) ).split( ',' );

	if ( ! $( '.letter.active' ).length ) {
		return;
	}
	showClue( questionNumbers[0], $( '.letter.active' ).parent().index(), $( '.letter.active' ).parent().parent().index() );
});

function getDirection( questionNumber ) {
	var i = 0;
	var j = 0;
	for ( i ; i < grid.length; i++ ) {
		for ( j ;j < grid[i].length; j++ ) {
			if ( -1 != String( grid[i][j]).indexOf( questionNumber ) ) {
				if ( grid[i + 1][j] == questionNumber || grid[i - 1][j] == questionNumber ) {
					return 'vertical';
				}

				if ( grid[i][j + 1] == questionNumber || grid[i][j - 1] == questionNumber ) {
					return 'horizontal';
				}
			}
		}
	}
}

function getStartPos( questionNumber, direction ) {
	var i = 0;
	var j = 0;

	if ( 'horizontal' == direction ) {
		for ( i; i < grid.length;i++ ) {
			for ( j; j < grid[i].length; j++ ) {
				if ( -1 != String( grid[i][j]).indexOf( questionNumber ) ) {
					return [ i, j ];
				}
			}
		}
	} else if ( 'vertical' == direction ) {
		for ( i ;i < grid.length;i++ ) {
			for ( j ;j < grid[i].length; j++ ) {
				if ( -1 != String( grid[j][i]).indexOf( questionNumber ) ) {
					return [ i, j ];
				}
			}
		}
	}
}

function fillAnswer({ questionNumber }) {
	var questionAnswer = answers[{ questionNumber } - 1];
	var direction = getDirection( questionNumber );
	var startPos = getStartPos( questionNumber, direction );
	var answerLetters = questionAnswer.split( '' );
	var i = 0;

	$( '#puzzle td div' ).css( 'color', 'initial' );


	if ( 'horizontal' == direction ) {
		for ( i ; i < answerLetters.length; i++ ) {
			$( '#puzzle tr:nth-child(' + ( startPos[0] + 1 ) + ') td:nth-child(' + ( startPos[1] + 1 + i ) + ') div' ).text( answerLetters[i]);
		}

	} else if ( 'vertical' == direction ) {
		for ( i ; i < answerLetters.length; i++ ) {
			$( '#puzzle tr:nth-child(' + ( startPos[1] + 1 + i ) + ') td:nth-child(' + ( startPos[0] + 1 ) + ') div' ).text( answerLetters[i]);
		}

	}
}

function clearAnswer( questionNumber ) {

	var questionAnswer = answers[questionNumber - 1];
	var direction = getDirection( questionNumber );
	var startPos = getStartPos( questionNumber, direction );
	var answerLetters = questionAnswer.split( '' );
	var i = 0;

	$( '#puzzle td div' ).css( 'color', 'initial' );


	if ( 'horizontal' == direction ) {
		for ( i ; i < answerLetters.length; i++ ) {
			$( '#puzzle tr:nth-child(' + ( startPos[0] + 1 ) + ') td:nth-child(' + ( startPos[1] + 1 + i ) + ') div' ).text( '' );
		}

	} else if ( 'vertical' == direction ) {
		for ( i ; i < answerLetters.length; i++ ) {
			$( '#puzzle tr:nth-child(' + ( startPos[1] + 1 + i ) + ') td:nth-child(' + ( startPos[0] + 1 ) + ') div' ).text( '' );
		}

	}
}

/***********
 *
 * Check Answer function
 *
*/

function checkAnswer( questionNumber ) {
	var questionAnswer = answers[questionNumber - 1];
	var direction = getDirection( questionNumber );
	var startPos = getStartPos( questionNumber, direction );
	var answerLetters = questionAnswer.split( '' );
	var i = 0;

	if ( 'horizontal' == direction ) {
		for ( i ; i < answerLetters.length; i++ ) {
			if ( $( '#puzzle tr:nth-child(' + ( startPos[0] + 1 ) + ') td:nth-child(' + ( startPos[1] + 1 + i ) + ') div' ).text() != questionAnswer[i] && '' != $( '#puzzle tr:nth-child(' + ( startPos[0] + 1 ) + ') td:nth-child(' + ( startPos[1] + 1 + i ) + ') div' ).text() ) {
				$( '#puzzle tr:nth-child(' + ( startPos[0] + 1 ) + ') td:nth-child(' + ( startPos[1] + 1 + i ) + ') div' ).css( 'color', 'red' );
			}
		}

	} else if ( 'vertical' == direction ) {
		for ( i ; i < answerLetters.length; i++ ) {
			if ( $( '#puzzle tr:nth-child(' + ( startPos[1] + 1 + i ) + ') td:nth-child(' + ( startPos[0] + 1 ) + ') div' ).text() != questionAnswer[i] && '' != $( '#puzzle tr:nth-child(' + ( startPos[1] + 1 + i ) + ') td:nth-child(' + ( startPos[0] + 1 ) + ') div' ).text() ) {
				$( '#puzzle tr:nth-child(' + ( startPos[1] + 1 + i ) + ') td:nth-child(' + ( startPos[0] + 1 ) + ') div' ).css( 'color', 'red' );
			}
		}

	}
}


/***********
 *
 * Show Answer function
 *
*/

function showClue( questionNumber, i, j ) {
	var questionAnswer = answers[questionNumber - 1];
	var direction = getDirection( questionNumber );
	var startPos = getStartPos( questionNumber, direction );
	var answerLetters = questionAnswer.split( '' );

	if ( 'horizontal' == direction ) {
		$( '#puzzle tr:nth-child(' + ( j + 1 ) + ') td:nth-child(' + ( i + 1 ) + ') div' ).text( answerLetters[i - startPos[1]]).css( 'color', 'initial' );
	} else if ( 'vertical' == direction ) {
		$( '#puzzle tr:nth-child(' + ( j + 1 ) + ') td:nth-child(' + ( i + 1 ) + ') div' ).text( answerLetters[j - startPos[1]]).css( 'color', 'initial' );
	}
}
