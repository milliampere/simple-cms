<footer class="footer">
  <div class="container-fluid">
    <span class="text-muted">© Simple-CMS 2017</span>
  </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="../app/js/bootstrap.min.js"></script>
<script src="../app/js/main.js"></script>
<script src="../app/js/ajax.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="../dist2/wysihtml-toolbar.min.js"></script>-->
<!-- wysihtml5 parser rules -->
<script src="../parser_rules/advanced_and_extended.js"></script>
<script>
var editor = new wysihtml.Editor("wysihtml-textarea", { // id of textarea element
  toolbar:      "wysihtml-toolbar", // id of toolbar element
  parserRules:  wysihtml5ParserRules // defined in parser rules set 
});
</script>
</body>
</html>