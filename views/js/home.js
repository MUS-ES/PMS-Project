//Sidebar Dropdown

const allDropdown = document.querySelectorAll("#sidebar .side-dropdown");

allDropdown.forEach(item=> {
  const a = item.parentElement.querySelector("a:first-child");
  a.addEventListener("click", function(e){
    e.preventDefault();

    // if(!this.classList.contains("active")) {
    //   allDropdown.forEach(i=> {
    //     const aLink = i.parentElement.querySelector("a:first-child");
    //     aLink.classList.remove("active");
    //     i.classList.remove("show");
    //   });
    // }

    item.classList.toggle("show");
  });
});


//Profile Dropdown
const profile = document.querySelector("nav .profile");
const imgProfile = profile.querySelector("img");
const dropdownProfile = profile.querySelector(".profile-link");

imgProfile.addEventListener("click", function() {
  dropdownProfile.classList.toggle("show");
});

//Menu
const allMenu = document.querySelectorAll("main .content-data .head .menu");
allMenu.forEach(item => {
    const icon = item.querySelector(".icon");
    const menuLink = item.querySelector(".menu-link");
    icon.addEventListener("click", function () {
      menuLink.classList.toggle("show");
    });
  });

window.addEventListener("click", function(e) {
  if(e.target !== imgProfile) {
    if(e.target !== dropdownProfile) {
      if(dropdownProfile.classList.contains("show")) {
        dropdownProfile.classList.remove("show");
      }
    }
  }

  // Menu
  allMenu.forEach(item => {
      const icon = item.querySelector(".icon");
      const menuLink = item.querySelector(".menu-link");
      if(e.target !== icon) {
        if(e.target !== menuLink) {
          if(menuLink.classList.contains("show")) {
            menuLink.classList.remove("show");
          }
        }
      }
 });
});

//SideBar Collapse
const toggleSidebar = document.querySelector("nav .toggle-sidebar");
const sidebar = document.getElementById("sidebar");
const iconRight = document.querySelectorAll("#sidebar .side-menu .icon-right");

toggleSidebar.addEventListener("click", function () {
  sidebar.classList.toggle("hide");

  if(sidebar.classList.contains("hide")) {
     iconRight.forEach(item => {
       item.textContent="";
       })
  }else {
    iconRight.forEach(item=> {
      item.textContent = item.dataset.text;
    })

     }
  }
);



//ApexChart
var options = {
          series: [{
          name: 'Sales',
          data: [31, 40, 28, 51, 42, 109, 100]
        }, {
          name: 'Purchases',
          data: [11, 32, 45, 32, 34, 52, 41]
        }],
          chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'datetime',
          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
