// ! SIDEBAR SCRIPTS 
const allDropDown = document.querySelectorAll('#sidebar .side-dropdown');
const sideBar = document.getElementById('sidebar');

allDropDown.forEach(item => {
  const aHref = item.parentElement.querySelector('a:first-child');
  
  aHref.addEventListener('click', function(e) {
    e.preventDefault();

    if(!this.classList.contains('active')){
      allDropDown.forEach(i => {
        const allaHref = i.parentElement.querySelector('a:first-child');

        allaHref.classList.remove('active');
        i.classList.remove('show');
      });
    }

    this.classList.toggle('active');
    item.classList.toggle('show');
  });
});

const burgerBar = document.querySelector('nav .toggle-sidebar');
const allSideBarDivider = document.querySelectorAll('#sidebar .divider');

if(sideBar.classList.contains('hide')){
  allSideBarDivider.forEach(item => {
    item.textContent = '-';
  });
  allDropDown.forEach(item => {
    const aHref = item.parentElement.querySelector('a:first-child');  
    aHref.classList.remove('active');
    item.classList.remove('show');
  });
}else{
  allSideBarDivider.forEach(item => {
    item.textContent = item.dataset.text;
  });
}

burgerBar.addEventListener('click', function() {
  sideBar.classList.toggle('hide');

  if(sideBar.classList.contains('hide')){
    allSideBarDivider.forEach(item => {
      item.textContent = '-';
    });

    allDropDown.forEach(item => {
      const aHref = item.parentElement.querySelector('a:first-child');  
      aHref.classList.remove('active');
      item.classList.remove('show');
    });
  }else{
    allSideBarDivider.forEach(item => {
      item.textContent = item.dataset.text;
    });
  }
});

sideBar.addEventListener('mouseleave', function() {
  if(this.classList.contains('hide')){
    allDropDown.forEach(item => {
      const aHref = item.parentElement.querySelector('a:first-child');  
      aHref.classList.remove('active');
      item.classList.remove('show');
    });
    allSideBarDivider.forEach(item => {
      item.textContent = '-';
    });
  }
});

sideBar.addEventListener('mouseenter', function() {
  if(this.classList.contains('hide')){
    allDropDown.forEach(item => {
      const aHref = item.parentElement.querySelector('a:first-child');  
      aHref.classList.remove('active');
      item.classList.remove('show');
    });
    allSideBarDivider.forEach(item => {
      item.textContent = item.dataset.text;
    });
  }
});

// ! END SIDEBAR SCRIPTS

// ! MENU ICON ... SCRIPTS
const menu = document.querySelectorAll('main .content-data .menu');

menu.forEach(item => {
  const menuIcon = item.querySelector('.icon');
  const menuLink = item.querySelector('.menu-link');

  menuIcon.addEventListener('click', function() {
    menuLink.classList.toggle('show');
  });
});
// ! END MENU ICON ... SCRIPTS

// ! TOPBAR SCRIPTS
const topProfile = document.querySelector('nav .profile');
const imgProfile = topProfile.querySelector('img');
const dropDownProfile = topProfile.querySelector('.profile-link');

imgProfile.addEventListener('click', function(e) {
  e.preventDefault();

  dropDownProfile.classList.toggle('show');
});

window.addEventListener('click', function(e) {
  if(e.target !== imgProfile){
    if(e.target !== dropDownProfile){
      if(dropDownProfile.classList.contains('show')){
        dropDownProfile.classList.remove('show');
      }
    }
  }
  menu.forEach(item => {
    const menuIcon = item.querySelector('.icon');
    const menuLink = item.querySelector('.menu-link');
  
    if(e.target != menuIcon){
      if(e.target != menuLink){
        if(menuLink.classList.contains('show')){
          menuLink.classList.remove('show');
        }
      }
    }
  });
});

// ! END TOPBAR SCRIPTS


// ! PROGRESS BAR
// ?? THIS CODE USE TO READ THE data-value OF EACH PROGRESS BAR
// ?? --value USE TO SET AUTOMATIC IN THE CSS, CHECK THE main .card .progress::before {width: var(--value);} in CSS STYLE
const allProgressBar = document.querySelectorAll('main .card .progress');

allProgressBar.forEach(item => {
  item.style.setProperty('--value', item.dataset.value);
});
// ! END PROGRESS BAR


// ! CHARTS DATA
// var options = {
//   series: [{
//     name: 'series1',
//     data: [31, 40, 28, 51, 42, 109, 100]
//   }, {
//     name: 'series2',
//     data: [11, 32, 45, 32, 34, 52, 41]
//   }],
//   chart: {
//     height: 350,
//     type: 'area'
//   },
//   dataLabels: {
//     enabled: false
//   },
//   stroke: {
//     curve: 'smooth'
//   },
//   xaxis: {
//     type: 'datetime',
//     categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
//   },
//   tooltip: {
//     x: {
//       format: 'dd/MM/yy HH:mm'
//     },
//   },
// };

// var chart = new ApexCharts(document.querySelector("#splineChart"), options);
// chart.render();
// ! END CHARTS DATA

$(function(){
  validators();
});

function formatDate(dateString) {
  const date = new Date(dateString);
  const options = { year: 'numeric', month: 'short', day: '2-digit' };
  const formattedDate = date.toLocaleDateString('en-US', options);

  return formattedDate.replace(/([A-Za-z]{3})\s/, '$1. ');
}

function formatTime(timeString) {
  var [hours, minutes] = timeString.split(':').map(Number);

    let period = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12 || 12; // Convert hour to 12-hour format
    hour = hours <= 9 ? '0'+hours : hours; 
    minutes = minutes < 10 ? '0' + minutes : minutes; // Add leading zero to minutes if needed

    return hour+":"+minutes+" "+period;
}

function openModal(modalid){
  $("#"+modalid).modal("show");
}

function closeModal(modalid){
  $("#"+modalid).modal("hide");
}

function validators(){
  $(".peracash").each(function(){
    $(this).focusout(function(){
      var amnt = this.value.replace(",", "");
      if(amnt > 0){
        var peramo = (Number(amnt) ).toLocaleString('en-US', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
        $(this).val(peramo);
      }else{
        $(this).val("");
      }
    });
  });

    // Allow numbers and other characters only.
  $(".numonly").keypress(function (e) {
     if (/\d+|,+|[.b]+|[()b]+|-+/i.test(e.key) ){
        //  console.log("character accepted: " + e.key)
       }else {
        //  console.log("illegal character detected: "+ e.key)
         return false;
     }
  });

  // Allow letters and space only
  $('.letteronly').keypress(function (e) {
      var regex = new RegExp(/^[a-zA-Z\s]+$/);
      var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
      if (regex.test(str)) {
          return true;
      }
      else
      {
      e.preventDefault();
      // alert('Numbers and other characters are not allowed.');
      return false;
      }
  });

  // $("[data-mask]").inputmask();

  // // Codes for date and time picker
  // $('.timepicker').datetimepicker({
  //     datepicker:false,
  //     format:'H:i A',
  //     step:5
  // });

  // $('.datepicker').datetimepicker({
  //     // minDate:new Date(),
  //     lang:'ch',
  //     timepicker:false,
  //     format:'Y-m-d',
  //     formatDate:'Y-m-d',
  //     scrollMonth : false,
  //     scrollInput : false
  // });

  $(".phone-format").focus(function(){
    if($(this).val() == ""){
      $(this).val("(+63)");
    }
  });

  $(".phone-format").focusout(function(){
    var mobtext = $(this);
    if(mobtext.val().length < 17){
      $(this).val("");
    }
  });

  $('.phone-format').keydown(function (e) {
    var key = e.charCode || e.keyCode || 0;
    $phone = $(this);
    $laman = $(this).val().substring(0, 1);

    if($laman != "+"){
        $('.phone-format').attr("maxlength", 18);
        if (key !== 8 && key !== 9) {
            if ($phone.val().length === 5) {
                $phone.val($phone.val() + ' ');
            }
            if ($phone.val().length === 9) {
                $phone.val($phone.val() + '-');
            }
            if ($phone.val().length === 13) {
                $phone.val($phone.val() + '-');
            }
            if ($phone.val().length === 0) {
                $phone.val($phone.val() + '(+63) ');
            }
        }else{
          if ($phone.val().length === 5) {
              $phone.val($phone.val() + ')');
          }
        }
    }
    // return (key == 8 || key == 9 || key == 46 || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
    }).bind('focus click', function () {
        $phone = $(this);
        if ($phone.val().length === 0) {
            $phone.val('');
        }
        else {
            var val = $phone.val();
            $phone.val('').val(val);
        }
    }).blur(function () {
        $phone = $(this);
        if ($phone.val() === '') {
            $phone.val('');
        }
    });
    // End of contact number 3 formats

    // 1 Capitalize string - convert textbox user entered texts to uppercase
    $(".txtuppercase").each(function(){
        $(this).keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });
    });

    // 2 Capitalize string first character only to uppercase
    $(".txtcapital").each(function(){
        $(this).keyup(function() {
            var caps = $(this).val();
            caps = caps.charAt(0).toUpperCase() + caps.slice(1);
            $(this).val(caps);
        });
    });

      // 3 Capitalize string every 1st chacter of every word to uppercase
    $(".txt_firstCapital").each(function(){
        $(this).keyup(function()
        {
            var str = $(this).val();

            var spart = str.split(" ");
            for ( var i = 0; i < spart.length; i++ )
            {
                var j = spart[i].charAt(0).toUpperCase();
                spart[i] = j + spart[i].substr(1);
            }
          $(this).val(spart.join(" "));
        });
    });
}

function getage(date, age){
  var mybirthday = new Date($("#" + date).val());
  var ageDifMs = Date.now() - mybirthday.getTime();
  var ageDate = new Date(ageDifMs);
  var myage = Math.abs(ageDate.getUTCFullYear() - 1970);

  if(mybirthday != "Invalid Date"){
    $("#" + age).val(myage);
  }
}

function showimg(){
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("fileInput").files[0]);

  oFReader.onload = function (oFREvent) {
      document.getElementById("imagefileInput").src = oFREvent.target.result;
  };
}

function generatePassword() {
  const lowercase = 'abcdefghijklmnopqrstuvwxyz';
  const uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  const numbers = '0123456789';
  const specialCharacters = '!@#$%^&*()_+[]{}|;:,.<>?';
  
  // Ensure each category is represented at least once
  const randomLowercase = lowercase[Math.floor(Math.random() * lowercase.length)];
  const randomUppercase = uppercase[Math.floor(Math.random() * uppercase.length)];
  const randomNumber = numbers[Math.floor(Math.random() * numbers.length)];
  const randomSpecial = specialCharacters[Math.floor(Math.random() * specialCharacters.length)];
  
  // Combine the required characters
  let password = randomLowercase + randomUppercase + randomNumber + randomSpecial;
  
  // Add random characters from the allowed categories, excluding special characters, to complete the password to exactly 8 characters
  const allCharacters = lowercase + uppercase + numbers;
  while (password.length < 8) {
      password += allCharacters[Math.floor(Math.random() * allCharacters.length)];
  }
  
  // Shuffle the password to randomize the order
  password = password.split('').sort(() => Math.random() - 0.5).join('');
  
  return password;
}

function escapeHtml(text) { //ESCAPE THE HTML CHARACTERS
    return $('<div>').text(text).html();
}