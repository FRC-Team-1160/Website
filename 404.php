<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="404">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Error 404</title>
        <link property="stylesheet" href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
        <link rel="author" href="humans.txt">
        <style type="text/css">
            html {
                background:url('/ti-static/site/theme-Ti-22/assets/robot-fail.gif') no-repeat center;
                background-size:cover;
                height:100%;
                width:100%;
            }
            body {
                height:100%;
                margin:0;
                padding:0;
                display: inline-block;
                width: 100%;
                background:rgba(0, 0, 0, 0.2);
                font-family:'Source Sans Pro', sans-serif;
                font-weight:300;
            }
            header {
                text-align:center;
                color:#FFF;
                position: relative;
                top: 50%;
                margin:0;
                transform: translateY(-50%);
            }
            @media screen and (max-width: 600px) {
                header {
                    top:2em;
                    margin:0;
                    transform: translateY(0);
                }
            }
            .error {
                max-width:90%;
                width:20em;
                margin:auto;
            }
            a, a:visited {
                color:#fff;
                font-weight:700;
                text-decoration: none;
                border-bottom:1px solid;
            }
            p.source {
                position:absolute;
                bottom:30px;
                right:33px;
                margin:0;
            }
            .source a {
                font-weight:300;
                font-size:80%;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="error">
                <h1>Error 404</h1>
                <p>Something not so terribly wrong has happened. Try checking the spelling of the url path or making sure that you followed the right link.</p>
                <p><a href="http://www.titaniumrobotics.com">Go to Titanium Robotics</a></p>
            </div>
        </header>
                <p class="source"><a href="https://www.youtube.com/watch?v=5CiE32h55HI" target="_blank">GIF Source</a></p>
    </body>
</html>
<?php /*OLD VERSION get_header(); ?>
<div class="contents">
	<div class="post">
		<div class="post-content">
			<div class="entry">
				<div class="errorimg">
					<img src="<?php bloginfo('template_directory') ?>/assets/error404smaller.png" Alt="Robot" title="Robot" style="margin:auto; float:none; display:block;" />
					<p style="font-size:small; color:DIMGRAY; text-align:center;">Artwork by <a href="http://www.itsallwong.com">Nathan Wong</a></p>
				</div>

				<div class="errortemp">
					<h2><b style="color:#f14a29;">Error 404: </b>
						We sincerely appologize, but it seems as if the page you requested could not be found or the link you followed has expired.</h2>
					<h4>The issue at hand is neither spacey-wacey nor timey-wimey, so don't panic.</h4>
					<p>Perhaps you should try a search?</p>
					<div class="searchit">
					<?php get_search_form(); ?>
					</div>
					<div class="clear"></div>
				</div>

				<div class="clear"></div>

			</div>
		</div>
	</div>
<?php get_footer(); */?>