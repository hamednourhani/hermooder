window.site_logo = theme_info.theme_dir+"/images/hermooder-logo.png";
console.log(site_logo);
window.loading_screen = window.pleaseWait({

		        //logo: theme_info.theme_dir+"/images/hermooder-logo.png",
		        //console.log(site_logo);
		        logo:site_logo,

		        logo: "wp-content/themes/hermooder.com/images/hermooder-logo.png",

		        backgroundColor: '#fff',
		        loadingHtml: '<div class="sk-cube-grid"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div><div class="sk-cube sk-cube3"></div><div class="sk-cube sk-cube4"></div><div class="sk-cube sk-cube5"></div><div class="sk-cube sk-cube6"></div><div class="sk-cube sk-cube7"></div><div class="sk-cube sk-cube8"></div><div class="sk-cube sk-cube9"></div></div>',
    
		    });