require 'susy'
http_path = "hermooder"
css_dir = (environment == :production) ? "css/temp" : "css"          #where the CSS will saved
sass_dir = "css/sass"           #where our .scss files are
javascripts = "js"
images_dir = "images"
fonts_dir = "css/fonts"
output_style = (environment == :production) ? :compressed : :nested
relative_assets = true
