<?php
$page = "development";
$sub_page = "http-api";
$title = "LanguageTool";
$title2 = "HTTP API";
$lastmod = "2012-10-10 19:20:00 CET";
include("../../include/header.php");
include('../../include/geshi/geshi.php');
?>

<h2 class="firstpara">Using LanguageTool from Other Applications</h2>

    <p>LanguageTool comes with its own embedded HTTP server so you can send a text
      to LanguageTool via HTTP and get the detected errors back as XML. This embedded server can be started in two ways:</p>

    <ul>
      <li>Start the stand-alone application and configure it (<em>File -&gt; Options...</em>) to listen on a port that
        is not used yet (the default port, 8081, should often be okay). This way LanguageTool will also be available
        in server mode until you stop it.
      </li>
      <li>
        <p>Start LanguageTool on the command line using this command:</p>

       	<tt>java -cp LanguageTool.jar org.languagetool.server.HTTPServer</tt>

        <p>You can use the <tt>--port</tt> or <tt>-p</tt> option to specify the port number. If
        no port number is specified, the default (8081) is used. For security reasons, the server will
        not be accessible from other hosts. If you want to run a server for remote users you will
        need the <tt>--public</tt> option (not much tested and thus deprecated) or  write a small Java program
        that creates an instance of
        <tt><a href="http://www.languagetool.org/development/api/index.html?org/languagetool/server/HTTPServer.html">org.languagetool.server.HTTPServer</a></tt>.
      </li>
    </ul>

    <p>You can test the server by calling this URL in your browser:</p>

    <tt>http://localhost:8081/?language=en&amp;text=my+text</tt><br />

    <p>If you're not just testing you should use HTTP POST to transfer your data. You
    can test it like this:</p>

    <tt>curl --data "language=en-US&text=a simple test" http://localhost:8081</tt>

    <p>The <tt>language</tt> parameter must specify the language code
	of the text to be checked (e.g. <tt>en</tt> or <tt>en-US</tt>). You can also specify <tt>motherTongue</tt>
	parameter to specify your mother tongue (for false friend checks). The <tt>text</tt> parameter is the
	text itself. If you want to test bilingual text (containing
	source and translation), simply specify also the <tt>srctext</tt> parameter. This way bitext mode will be
	activated automatically.</p>

	<p>The server may be configured to enable or disable some rules by adding <tt>enabled</tt> and
	<tt>disabled</tt> as parameters and listing rule identifiers delimited with commas, for example:</p>

	<tt>http://localhost:8081/?language=en&amp;disabled=STRANGE_RULE,ANOTHER_RULE&amp;text=my+text</tt><br />

	<p>In this example, two rules will be disabled: <tt>STRANGE_RULE</tt> and <tt>ANOTHER_RULE</tt>. Note that there
	should be no space after the comma.</p>

	<p>Note that for a server started from a GUI, a user may configure it in the configuration dialog box to disable
	some unwanted rules. This may be beneficial if the calling program does not allow configuration of the call to the
	LanguageTool server, and the user wants to enable or disable some checks. However, if the program does disable or
	enable any rules, then the configuration set by the user will be silently ignored.</p>

    <p>For the input "this is a test" the LanguageTool server will reply with
	an XML response like this:</p>

<div class="xmlrule" style="margin-top:5px"><?php hl('<?xml version="1.0" encoding="UTF-8"?>
<matches software="LanguageTool" version="1.9" buildDate="2012-09-29">
<error fromy="0" fromx="0" toy="0" tox="5"
  ruleId="UPPERCASE_SENTENCE_START"
  msg="This sentence does not start with an uppercase letter"
  replacements="This" context="this is a test."
  contextoffset="0" offset="0"
  errorlength="4" category="Capitalization"/>
</matches>'); ?>
</div>

    <p>Some rules contain a link to a webpage. The link
    will be available as the contents of the <tt>url</tt> attribute of the <tt>error</tt> element.</p>

    <p>Here' a <?=show_link("a DTD with short descriptions of the elements", "https://languagetool.svn.sourceforge.net/svnroot/languagetool/trunk/JLanguageTool/src/main/resources/org/languagetool/resource/api-output.dtd", 0) ?>.</p>

    <p>You can call <tt>http://localhost:8081/Languages</tt> to get a list of all languages available.</p>

<?php
include("../../include/footer.php");
?>