<html>
<head>
  <style>
    @page {
      margin: 0cm 0cm;
      font-family: Arial;
    }

    body {
      margin: 3cm 2cm 2cm;
    }

    header .header {
      justify-content: space-between;
      display: block;
    }


    header .box {
      width: 32%;
      text-align: center;
      display: inline-block;
      justify-content: center;
    }

    header .img {
      width: 150px;
    }

    header .content-site-data {
      font-size: 14px;
      display: block;
    }


    #content {
      height: auto;
      padding: 7px;

    }

    #pdfPreContent {


    }

    #pdfContent {


    }

    #pdfPostContent {


    }

    #gridFooter {
      margin: 0.25cm 0cm 0cm;
      height: auto;

    }

    #pdfFooterContent {

    }
  </style>
</head>
<body>
<header>
  <div class="header">
    <meta charset="UTF-8">
    <div class="box">
      <img class="img" src="@setting('isite::'.setting('isite::pdfLogoHeader'))" alt="Logotipo">
    </div>
    <div class="box">
      <h1>{!!setting("core::site-name")!!}</h1>
    </div>
    <div class="box" style="justify-content: center">
        <strong>{{trans("isite::pdf.settings.pdf.text.Date")}}</strong>
        <div><?php echo date("Y-m-d")?></div>
    </div>
  </div>
  <div class="content-site-data">
    <br>
    <strong>{{trans("isite::pdf.settings.pdf.text.Phone")}} : </strong>
    <div id="info" style="display: inline-block"><strong>
        <x-isite::contact.phones/>
      </strong></div>
    <br>
    <strong>{{trans("isite::pdf.settings.pdf.text.Address")}} : </strong>
    <div id="info" style="display: inline-block"><strong>
        <x-isite::contact.addresses/>
      </strong></div>
    <br>
    <strong>{{trans("isite::pdf.settings.pdf.text.Email")}} : </strong>
    <div id="info" style="display: inline-block"><strong>
        <x-isite::contact.emails/>
      </strong></div>
  </div>
</header>
<main>
  <div id="content">
    <br>
    <meta charset="UTF-8">
    <div id="pdfPreContent">{!!setting("isite::pdfPreContent")!!}</div>
    <div id="pdfContent">
      @if(isset($data["content"]))
        @include($data["content"],$data)
      @else
        {{trans("isite::pdf.settings.pdf.text.Document_without_content")}}
      @endif
    </div>
  </div>
  <div id="pdfPostContent">{!!setting("isite::pdfPostContent")!!}</div>
</main>
<footer>
  <div id="gridFooter">
    <div id="pdfFooterContent">{!!setting("isite::pdfFooterContent")!!}</div>
  </div>
</footer>
</body>
</html>