<!DOCTYPE html>
<html lang="en">
<head>
	<title> Ficheiro</title>
	<script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
	<script src="{{ asset ('js/jquery-ui.js') }}"></script>
</head>
<body>
	<input type="hidden" name="ficheiro" id="ficheiro" value="{{ $nomeficheiro }}">



<script src=" {{ asset('js/pdfobject.min.js') }}"></script> 
<script>
var file = document.getElementById("ficheiro").value;
PDFObject.embed("{{ asset('storage/docs') }}"+'/'+file, document.body);</script>
</body>
</html>

