//ninivert, May 2016

key_code = {
  red: {
    left: 65,
    right: 68,
    down: 83
  },
  blue: {
    left: 37,
    right: 39,
    down: 40
  }
}
default_color = 1;
last_loser = 1;
loser_privilege = true;

function initialize() {
  /*------------------------------*/
  /*VARIABLES*/
  /*------------------------------*/
  curr_select = 0;
  curr_color = (loser_privilege === true) ? last_loser : default_color;

  /*------------------------------*/
  /*GRID*/
  /*------------------------------*/
  //0 = null
  //1 = red (left)
  //2 = blue (right)
  //7 width, 6 height
  grid = [
    [0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0],
  ];

  loadGrid();
  renderGrid();
  shiftSelect(0);
}

function resetGrid() {
  for (var y = 0; y < grid.length; y++) {
    for (var x = 0; x <= grid.length; x++) {
      grid[y][x] = 0;
    }
  }
  renderGrid();
}

/*------------------------------*/
/*GRID RENDERING*/
/*------------------------------*/
function loadGrid() {
  document.getElementById('grid').innerHTML = '';
  for (var y = 0; y < grid.length; y++) {
    document.getElementById('grid').innerHTML += '<div class="piece-line">';
    for (var x = 0; x < grid[y].length; x++) {
      document.getElementsByClassName('piece-line')[y].innerHTML += '<div class="piece default"></div>';
    }
    document.getElementsByClassName('piece-line')[y].innerHTML += '</div>';
  }
}

function renderGrid() {
  for (var y = 0; y < grid.length; y++) {
    for (var x = 0; x < grid[y].length; x++) {
      document.getElementsByClassName('piece')[y * grid[y].length + x].classList.remove('default', 'red', 'blue', 'new');
      if (grid[y][x] === 0) {
        document.getElementsByClassName('piece')[y * grid[y].length + x].classList.add('default');
      }
      if (grid[y][x] === 1) {
        document.getElementsByClassName('piece')[y * grid[y].length + x].classList.add('red');
      }
      if (grid[y][x] === 2) {
        document.getElementsByClassName('piece')[y * grid[y].length + x].classList.add('blue');
      }
    }
  }
}

/*------------------------------*/
/*PLAYER INPUT*/
/*------------------------------*/
function newPiece(x, value) {
  if (grid[0][x] !== 0) {
    console.log('[newPiece] Full Row!');
  } else {
    grid[0][x] = value;
    var new_x = x;
    var new_y = 0;

    for (var y = 0; y < grid.length - 1; y++) {
      if (grid[y + 1][x] === 0) {
        grid[y + 1][x] = grid[y][x];
        grid[y][x] = 0;
        var new_x = x;
        var new_y = y + 1;
      }
    }

    curr_color = (curr_color === 1) ? 2 : 1;

    renderGrid();
    newPieceEffect(new_y, new_x);
  }
}

function shiftSelect(x) {
  for (var i = 0; i < grid[0].length; i++) {
    document.getElementsByClassName('piece')[i].classList.remove('selected');
  }
  document.getElementsByClassName('piece')[x].classList.add('selected');

  selectColor();
}

/*------------------------------*/
/*ANIMATIONS*/
/*------------------------------*/
function newPieceEffect(y, x) {
  document.getElementsByClassName('piece')[y * grid[y].length + x].classList.add('new');
  setTimeout(function() {
    document.getElementsByClassName('piece')[y * grid[y].length + x].classList.remove('new');
  }, 250);
}

function winningPieceEffect(pos_y, pos_x) {
  for (var i = 0; i < 4; i++) {
    document.getElementsByClassName('piece')[pos_y[i] * grid[pos_y[i]].length + pos_x[i]].classList.add('winning-piece');
  }
}

function selectColor() {
  document.getElementsByClassName('selected')[0].classList.remove('selected-blue', 'selected-red');
  document.getElementsByClassName('controls')[0].classList.remove('red', 'blue');
  if (curr_color === 2) {
    document.getElementsByClassName('selected')[0].classList.add('selected-blue');
    document.getElementsByClassName('controls')[0].classList.add('blue');
  } else {
    document.getElementsByClassName('selected')[0].classList.add('selected-red');
    document.getElementsByClassName('controls')[0].classList.add('red');
  }
}

/*------------------------------*/
/*WINNING LOGIC*/
/*------------------------------*/
function winCheck() {
  for (var y = 0; y < grid.length - 3; y++) {
    for (var x = 0; x < grid[y].length; x++) {
      if (grid[y + 3][x] === 1 && grid[y + 2][x] === 1 && grid[y + 1][x] === 1 && grid[y][x] === 1) {
        return {
          'winner': 'red',
          'pos_y': [y + 3, y + 2, y + 1, y],
          'pos_x': [x, x, x, x]
        }
      }
      if (grid[y + 3][x] === 2 && grid[y + 2][x] === 2 && grid[y + 1][x] === 2 && grid[y][x] === 2) {
        return {
          'winner': 'blue',
          'pos_y': [y + 3, y + 2, y + 1, y],
          'pos_x': [x, x, x, x]
        }
      }
    }
  }
  for (var y = 0; y < grid.length; y++) {
    for (var x = 0; x < grid[y].length - 3; x++) {
      if (grid[y][x + 3] === 1 && grid[y][x + 2] === 1 && grid[y][x + 1] === 1 && grid[y][x] === 1) {
        return {
          'winner': 'red',
          'pos_y': [y, y, y, y],
          'pos_x': [x + 3, x + 2, x + 1, x]
        }
      }
      if (grid[y][x + 3] === 2 && grid[y][x + 2] === 2 && grid[y][x + 1] === 2 && grid[y][x] === 2) {
        return {
          'winner': 'blue',
          'pos_y': [y, y, y, y],
          'pos_x': [x + 3, x + 2, x + 1, x]
        }
      }
    }
  }
  for (var y = 0; y < grid.length - 3; y++) {
    for (var x = 0; x < grid[y].length - 3; x++) {
      if (grid[y + 3][x + 3] === 1 && grid[y + 2][x + 2] === 1 && grid[y + 1][x + 1] === 1 && grid[y][x] === 1) {
        return {
          'winner': 'red',
          'pos_y': [y + 3, y + 2, y + 1, y],
          'pos_x': [x + 3, x + 2, x + 1, x]
        }
      }
      if (grid[y + 3][x + 3] === 2 && grid[y + 2][x + 2] === 2 && grid[y + 1][x + 1] === 2 && grid[y][x] === 2) {
        return {
          'winner': 'blue',
          'pos_y': [y + 3, y + 2, y + 1, y],
          'pos_x': [x + 3, x + 2, x + 1, x]
        }
      }
      if (grid[y][x + 3] === 1 && grid[y + 1][x + 2] === 1 && grid[y + 2][x + 1] === 1 && grid[y + 3][x] === 1) {
        return {
          'winner': 'red',
          'pos_y': [y, y + 1, y + 2, y + 3],
          'pos_x': [x + 3, x + 2, x + 1, x]
        }
      }
      if (grid[y][x + 3] === 2 && grid[y + 1][x + 2] === 2 && grid[y + 2][x + 1] === 2 && grid[y + 3][x] === 2) {
        return {
          'winner': 'blue',
          'pos_y': [y, y + 1, y + 2, y + 3],
          'pos_x': [x + 3, x + 2, x + 1, x]
        }
      }
    }
  }
  return 'none';
}

function winBox(player) {
  document.getElementById('win_text').innerHTML = player + ' wins!';
  document.getElementsByClassName('alert-box')[1].classList.toggle('alert-active');
  document.getElementsByClassName('alert-cover')[0].classList.toggle('cover-active');
}

/*------------------------------*/
/*CONTROLS*/
/*------------------------------*/
document.onkeydown = function(key) {
  if (document.getElementsByClassName('alert-box')[0].classList.contains('alert-active') || document.getElementsByClassName('alert-box')[1].classList.contains('alert-active')) {
    return;
  }
  switch (key.keyCode) {
    case key_code.red.left:
    case key_code.blue.left:
      control.left(key.keyCode);
      /*[←]*/
      break;
    case key_code.red.right:
    case key_code.blue.right:
      control.right(key.keyCode);
      /*[→]*/
      break;
    case key_code.red.down:
    case key_code.blue.down:
      control.down(key.keyCode);
      break;
  };
}

control = {
  left: function(key) {
    if (key == key_code.red.left && curr_color !== 1) {
      return;
    }
    if (key == key_code.blue.left && curr_color !== 2) {
      return;
    }
    if (curr_select !== 0) {
      shiftSelect(--curr_select);
    }
  },
  right: function(key) {
    if (key == key_code.red.right && curr_color !== 1) {
      return;
    }
    if (key == key_code.blue.right && curr_color !== 2) {
      return;
    }
    if (curr_select !== grid[0].length - 1) {
      shiftSelect(++curr_select);
    }
  },
  down: function(key) {
    if (key == key_code.red.down && curr_color !== 1) {
      return;
    }
    if (key == key_code.blue.down && curr_color !== 2) {
      return;
    }
    newPiece(curr_select, curr_color);
    selectColor();
    var win_out = winCheck();
    switch (win_out.winner) {
      case 'none':
        break;
      case 'red':
        winBox('Red');
        winningPieceEffect(win_out.pos_y, win_out.pos_x);
        last_loser = 2;
        break;
      case 'blue':
        winBox('Blue');
        winningPieceEffect(win_out.pos_y, win_out.pos_x);
        last_loser = 1;
        break;
    }
  }
}

/*------------------------------*/
/*AUTO EXECUTE*/
/*------------------------------*/
document.getElementsByClassName('alert-box')[0].classList.toggle('alert-active');
document.getElementsByClassName('alert-cover')[0].classList.toggle('cover-active');
initialize();