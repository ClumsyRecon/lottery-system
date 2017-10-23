  var nums = [];
  var selected = 0;

  function pick(i) {
    n = parseInt(i.id);
    /* if(nums.indexOf(n) > -1) {
      i.style.backgroundColor = "tomato";
      shuffledown(nums.indexOf(n));
      nums[nums.indexOf(n)] = '';
      selected -= 1;
    } else */
    if(selected < 6 && nums.indexOf(n) <= -1) {
      i.style.backgroundColor = "#29b6f6";
      nums[selected] = n;
      selected += 1;
    }
    sort();
    updateOutput();
    if(selected == 6) {
      buy.disabled = false;
    }
  }

  function wipe() {
    for (var i = 0; i < nums.length; i++) {
      document.getElementById(nums[i]).removeAttribute("style");
    }
    nums = [];
    selected = 0;
    buy.disabled = true;
    updateOutput();
  }

  function updateOutput() {
    var outstr = "<div class='row'>";
    for (var i = 0; i < nums.length; i++) {
      outstr += "<div class='col s1 numbers'>" + nums[i] + "</div>";
    }
    outstr += "</div>";
    output.innerHTML = outstr;
  }

  function shuffledown(n) {
    for (var i = n; i < nums.length-1; i++) {
      if(i == (nums.length-1)) {
        nums[i] = null;
      } else {
        nums[i] = nums[i+1];
      }
    }
  }

  function sort() {
    var swapped;
    do {
        swapped = false;
        for (var i=0; i < nums.length-1; i++) {
            if (nums[i] > nums[i+1]) {
                var temp = nums[i];
                nums[i] = nums[i+1];
                nums[i+1] = temp;
                swapped = true;
            }
        }
    } while (swapped);
  }
