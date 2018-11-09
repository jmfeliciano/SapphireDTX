const EAST = 'east';
const SOUTH = 'south';
const NORTH = 'north';
const WEST = 'west';

// don't really need this class
function Cell(element, board) {
    if(!element || !board) {
        return null;
    }

    this.element = function() {
        return element;
    };

    this.board = function() {
        return board;
    };

    return $.extend(this, element);
}

function Board(selector, where) {
    const em = 4.5;
    var width = height = 1;
    var cell = '<div class="cell" style="width: '+em+'em; height: '+em+'em;"></div>';
    var cell_classes = '';

    selector = selector || '.js-board';
    where = where || 'body';
    
    $(selector).remove();
    $(where).append('<div class="'+selector.slice(1)+' board" style="width:'+em+'em;">'+cell+'</div>');
    var board = $(selector);

    this.height = function () {
        return height;
    };

    this.width = function () { 
        return width;
    };

    this.fade = function (value) {
        if (value) {
            board.addClass('faded');
        } else {
            board.removeClass('faded');
        }
    };

    // visual, the css width
    this.setWidth = function (value) {
        board.css('width', (value  * em) + 'em');
        $('.js-wrapper').css('margin-left', ((-value  * em) - 2)/2 + 'em');        
    };

    this.setCell = function () {
        cell = '<div class="cell'+cell_classes+'" style="width: '+em+'em; height: '+em+'em;"></div>';
    };

    this.remove = function () {
        board.remove();
    };
   
    this.cell = function(index) {
        if((index > (height * width)) || (index <= 0)) {
            return null;
        } else {
            return new Cell($('.cell', board).eq(index - 1), this);
        }
    };

    this.expand = function(direction) {
        if (!direction) {
            this.expand(SOUTH);
            this.expand(EAST);
        }

        switch (direction) {
            case NORTH:
            case SOUTH:
                var row = cell.repeat(width);
                height++;
                break;
            case WEST:
                $('.cell:nth-child(' + width + 'n+1)').before(cell);
                break;
            case EAST:
                $('.cell:nth-child(' + width + 'n)').after(cell);
                break;
        }

        switch (direction) {
            case NORTH:
                board.prepend(row);
                break;
            case SOUTH:
                board.append(row);
                break;
            case WEST:
            case EAST:
                width++;
                this.setWidth(width);
                break;
        }
    };

    this.shrink = function(direction) {
        if (!direction) {
            this.shrink(SOUTH);
            this.shrink(EAST);
        }

        switch (direction) {
            case NORTH:
            case SOUTH:
                height--;
                break;
            case WEST:
                $('.cell:nth-child(' + width + 'n+1)').remove();
                break;
            case EAST:
                $('.cell:nth-child(' + width + 'n)').remove();
                break;
        }

        switch (direction) {
            case NORTH:
                $('.cell:nth-child(-n+'+width+')').remove();
                break;
            case SOUTH:
                var index = (height * width) + 1;
                $('.cell:nth-child(n+'+index+')').remove();
                break;
            case WEST:
            case EAST:
                width--;
                this.setWidth(width);
                break;
        }
    };

    this.maxLevel = function () {
        return (height * height - height) / 2;
    };

    this.minLevel = function () {
        return (((height - 2) * (height - 1)) / 2) + 1;
    };

    this.markCells = function(classes) {
        cell_classes += ' ' + classes;
        $('.cell', board).addClass(classes);
        this.setCell();
    }

    this.unmarkCells = function(classes) {        
        cell_classes = cell_classes.replace(' '+classes, '');
        $('.cell', board).removeClass(classes);
        this.setCell();
    }
}

function Game() {
    const transition_time = 500;
    var board = null;
    var sequence = clicked =  [];
    var success = false;
    var shrink = expand = false;

    var min_level = level = best = 4;
    
    board = new Board(null, '.js-wrapper');
    board.markCells('preserve-3d transition-3d');
    board.expand();
    board.expand();
    board.expand();

    var hotdog = false;
    var padded = false;

    this.board = function() {
        return board;
    };

    this.sequence = function() {
        return sequence;
    };

    this.hotdog = function(value) {
        if (value) {
            board.markCells('hotdog');
            hotdog = true;
        } else {
            board.unmarkCells('hotdog');
            hotdog = false;
        }
    };

    this.padded = function(value) {
        if (value) {
            board.markCells('padded');            
            padded = true;
        } else {
            board.unmarkCells('padded');
            padded = false;            
        }
    };

    this.generateSequence = function(num) {        
        num = num || level;
    
        var length = board.width() * board.height();

        if (num > length) {
            return [];
        }

        var ids = [...Array(length + 1).keys()].slice(1);

        sequence = [];

        for(var i = 0; i < num; i++) {
            var rand = Math.floor(Math.random() * length);
            var choosen = ids[rand];

            length-=1;
            ids[rand] = ids[length];
            ids[length] = choosen;

            sequence.push(choosen);
        }

        return sequence;
    };

    this.countdown = function(number, interval) {
        $('.js-wrapper').append("<div class='js-countdown centered countdown'></div>");
        for(var i = number; i > 0; i--) {
            setTimeout(function(i){ $('.js-countdown').html(i); }, (number - i) * interval, i);
        }
        setTimeout(function(){ $('.js-countdown').remove(); }, number * interval);
    };

    this.clickable = function(value) {
        if (value) {
            board.markCells('js-card');
        } else {
            board.unmarkCells('js-card');
        }
    };

    this.flip = function(classes) {
        classes = classes || '';
        for (var i = 0; i < sequence.length; i++) {
            board.cell(sequence[i]).addClass('flipped ' + classes);
        }
    };

    this.unflip = function(list) {        
        if (!list) {
            list = sequence;
        }
        for (var i = 0; i < list.length; i++) {
            board.cell(list[i]).removeClass('flipped missed wrong');
        }
    };

    this.clicked = function(value) {
        clicked.push(value);
        
        var cell = board.cell(value).addClass('flipped').removeClass('js-card');

        var index = sequence.indexOf(value);

        if (index != -1) {
            sequence.splice(index, 1);
            if (sequence.length == 0) {
                this.over(true);
                this.complete(true, 0);
            }
        } else {
            cell.addClass('wrong');
            this.over(false);
                        
            setTimeout(() => { this.flip('missed'); }, transition_time);

            this.complete(false, transition_time);
        }
    };

    this.complete = function(value, time) {
        time = time || 0;
        var pause = 1000 + time;
        var interval = transition_time;

        var message = null;
        if (value) {
            message = "NICE!";
        } else {
            message = "TRY AGAIN";
            clicked = clicked.concat(sequence);
        }

        // pause 1000 for user
        // show you win message takes 500
        setTimeout(function(){ 
            $('.js-message').addClass('transition-3d').removeClass('centered-faceup').html(message);
        }, pause);
        
        // flip back clicked takes 500
        setTimeout(()=>{ this.unflip(clicked);}, pause+=interval);
        
        // hide you win message takes 500                
        setTimeout(function(){ 
            $('.js-message').addClass('centered-faceup');
        }, pause+=interval);

        setTimeout(function(){ 
            $('.js-play').show().addClass('transition-3d').removeClass('centered-facedown').html('CONTINUE?');
            board.fade(true);
        }, pause+=interval);
    };

    this.over = function(value) {
        this.clickable(false);
        if (value) {
            level+=1;
            if (level > best) {
                best+=1;
            }
            if (level > board.maxLevel()) {
                expand = true;
             }
        } else {
            if (level > min_level) {
                level-=1;
                if (level < board.minLevel()) {
                   shrink = true;
                }
            }
        }

    };
    
    this.play = function() {
        board.fade(false);
        sequence = clicked = [];        
        success = false;

        if (expand) {
            board.expand();
            expand = false;
        }

        if (shrink) {
            board.shrink();
            shrink = false;
        }

        $('.js-level').html(level);
        $('.js-best').html(best);

        this.countdown(3, 1000);
        this.generateSequence();
      
        setTimeout(() => { this.flip(); }, 3 * 1000);
        setTimeout(()=> { this.unflip(); this.clickable(true); }, 5 * 1000);
    };
}

$(function() {
    game = new Game();
        
    $('.js-hotdog').change(function() {        
        game.hotdog($(this).prop('checked'));
    });

    $('.js-tile').change(function() {
        game.padded($(this).prop('checked'));
    });

    $(document).on('click', '.js-play', function () {
        $(this).addClass('normal centered-facedown').hide();
        game.play();
    });

    $(document).on('click', '.js-card', function () {
        var index = $(this).index() + 1;        
        game.clicked(index);
    });

    $('.js-hotdog, .js-tile').click();
});