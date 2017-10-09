  var nums = [];
  var selected = 0;

  function pick(i) {
    n = parseInt(i.id);
    if(nums.indexOf(n) > -1) {
      i.style.backgroundColor = "silver";
      shuffledown(nums.indexOf(n));
      nums[nums.indexOf(n)] = '';
      selected -= 1;
    } else if(selected < 6) {
      i.style.backgroundColor = "cyan";
      nums[selected] = n;
      selected += 1;
    }
    sort();
    output.innerHTML = nums;
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
