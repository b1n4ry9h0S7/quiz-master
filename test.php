<!doctype html>
<html lang="en">
<head>
	<style>

	</style>
</head>
<body>
	<div class="container">
		<h1>
            Hello <span class="ityped"></span>
        </h1>
		<h2>
         <span class="ityped-two"></span>
        </h2>
	</div>
	<script src="includes/js/ityped.js"></script>
	<script>
		window.ityped.init(document.querySelector('.ityped'), {
            strings : ['World', 'Universe'],
            loop : true
        });
        window.ityped.init(document.querySelector('.ityped-two'), {
            strings : ['John', 'Frank'],
            loop : true
        });
	</script>
</body>
</html>
