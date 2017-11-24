@extends('layouts.template')

@section('content')

<div class="row" id="leitura">
    	
    </div>
    
    <script src="{{ asset('js/pdfobject.min.js') }}"></script>
    <script>PDFObject.embed("/pdf/sample-3pp.pdf", "#example1");</script>

@endsection
