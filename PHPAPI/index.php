<html>
<head>
<title>api REST API</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="well">
<h1>api REST API</h1>
</div>
<div class="container">
<div class="row">

<table class='table table-striped table-condensed'> <thead> <tr><th colspan='3'><div class='p-3 mb-2 bg-primary text-white'><h3><b>Users</b></h3></div><tr></th></thead><tbody><tr><td>Read</td><td>GET</td><td>/users/read.php?pageno=1&pagesize=30</td></tr><tr><td>Read One</td><td>GET</td><td>/users/read_one.php?id=1</td></tr><tr><td>Search</td><td>GET</td><td>/users/search.php?key=key&pageno=1&pagesize=30</td></tr><tr><td>Dynamic Search</td><td>POST</td><td>/users/search_by_column.php</td></tr><tr><td>Create</td><td>POST</td><td>/users/create.php</td></tr><tr><td>Update</td><td>POST</td><td>/users/update.php</td></tr><tr><td>Update Patch</td><td>POST</td><td>/users/update_patch.php</td></tr><tr><td>Delete</td><td>POST</td><td>/users/delete.php</td></tr></tbody></table>

</div>
</div>

</body>
</html>
