 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>

	<title>joseph tate's web site : curious since 1973</title>
<link rel="stylesheet" href="https://www.benfund.com/includes/style.css" type="text/css" />
	<script type="text/javascript" src="includes/js/prototype.lite.js"></script>
	<script type="text/javascript" src="includes/js/moo.fx.js"></script>
	<script type="text/javascript" src="includes/js/moo.fx.pack.js"></script>
	<script type="text/javascript" src="includes/js/prototype.js"></script>
	<script type="text/javascript">
	//the main function, call to the effect object
	function init(){
		
		var stretchers = document.getElementsByClassName('stretcher'); //div that stretches
		var toggles = document.getElementsByClassName('display'); //h3s where I click on

		//accordion effect
		var myAccordion = new fx.Accordion(toggles, stretchers, {opacity: true, duration: 700} );

		//hash functions
		var found = false;
		toggles.each(function(h3, i){
			var div = Element.find(h3, 'nextSibling'); //element.find is located in prototype.lite
			if (window.location.href.indexOf(h3.title) > 0) {
				myAccordion.showThisHideOpen(div);
				found = true;
			}
		});
		if (!found) myAccordion.showThisHideOpen(stretchers[0]);
	}
	</script>

</head>
<body>
<table cellspacing="0" cellpadding="0" align="center"><tr><td class="leftcolumn" width="150px" valign="top">
<div class="container">
<p><img src="images/flatface.png" width="75" height="76" /></p>
<div id="container">
   <div id="header">
		      	
				<h1>joseph tate's web site : </h1>

				<h1 id="h1curious">: curious since 1973</h1>
   </div>

<h3 class="display" title="where"><a href="#where">where</a></h3>
		<div id="content">
		
			
			<div class="stretcher">
<p>This is  Joseph Matthew Tate's web site, or, as he's known to family, friends and colleagues: jody. You'll find sections below on who I am and what I do. There's even more to see in the here, there, elsewhere section. You can contact me using this <a href="http://josephtate.com/contact/" title="send jody an email"> email form</a>. </p>

<p>The debts I've accumulated creating this new home page are many. Shout outs especially go to <a href="http://moofx.mad4milk.net/">moo.fx</a> (using <a href="http://prototype.conio.net/">prototype.js</a>) and <a href="http://www.avinashv.net/">Avinash Vora</a>'s guide to <a href="http://www.avinashv.net/tutorials/moofx/">moo.fx</a>. </p>
<p><em>Nota bene</em>: due to the recent revamp, some links may have broken and some files you're seeking may have gone missing from the server. If you find this is the case, please <a href="http://josephtate.com/contact/">email</a> and let me know. I've tried to make the transition to a new home page as painless as possible, but  there's always more work to be done. </p>

<p>Thanks for visiting. </p>
</b>
				
		   </div>
	   </div>

			<h3 class="display" title="who"><a href="#who">who</a></h3>
			<div class="stretcher">
				<p> I  received my <a href="http://en.wikipedia.org/wiki/Doctor_of_Philosophy" title="Doctor of Philosophy">Ph.D.</a> in English Literature from the <a href="http://www.washington.edu/" title="UW, pronounced 'you dub'">University of Washington</a> in <a href="http://www.cityofseattle.net/" title="seattle">Seattle</a>, <a href="http://access.wa.gov/">WA</a> in  August 2005.  I live in <a href="http://www.portlandonline.com/">Portland</a>, Oregon. You can read my full <a href="cv/index.html" title="Definition of CV: a special type of r?sum? used in the academic community. Earned degrees, teaching and research experience, publications, presentations, and related activities are featured. Unlike a r?sum?, a CV tends to be longer and informational rather than promotional.">curriculum vitae</a> (r&eacute;sum&eacute;).</p>

        <p>I was born in <a href="http://www.greatergreenville.com/default.asp" title="Green Vegas">Greenville</a>, <a href="http://www.myscgov.com/" title="South Carolina web site">South
 Carolina</a>, <a href="http://www.firstgov.gov/" title="United States">United States</a>, <a href="http://visibleearth.nasa.gov/" title="the earth from above">Earth</a>, in <a href="http://www.historychannel.com/cgi-bin/frameit.cgi?p=http%3A//www.historychannel.com/perl/timeline.pl%3Fyear%3D1973" title="what happened in 1973">1973</a>, the year <a href="http://www.tamu.edu/mocl/picasso/" title="Pablo">Picasso</a> died and Foreman became champ. <a href="images/meandturtle.jpg" rel="lightbox" title="picture of me holding a turtle">This</a> is a photo of me. I prefer to be called &quot;Jody&quot; (spelled with a &quot;-y&quot; and not an &quot;-ie&quot;) and the
only person allowed to ever call me &quot;Joe&quot; is my father. I am married to the lovely and talented <a href="http://josephtate.com/peops/lisa.html" title="a picture of Lisa">Lisa Hogan</a>. We have a dog named <a href="peops/abby.html" title="Abby the Beast, aka Abbeast aka Abigail Barkley Hoover, III">Abby</a> and we had <a href="http://josephtate.com/emma/" title="Emzilla! Run, RUN!">Emma</a>, our daughter, on
September 29, 2003.</p>

			</div>

			<h3 class="display" title="what"><a href="#what">what</a></h3>
			<div class="stretcher">
				<p>I am in the process of starting a one-man computer consulting &quot;company&quot;--can one person constitute a company?--for home and small business users in Portland, OR: 200ok Computer Consulting. I've started work on the home page, but to use current web-speak, the site remains in beta: <a href="http://200ok.josephtate.com">http://200ok.josephtate.com/</a>.</p> 

                <p><a href="http://www.amazon.com/exec/obidos/ASIN/0754639800/pulkpullanong-20/103-7333768-1383001?creative=125577&amp;camp=2321&amp;link_code=as1">The Music and Art of Radiohead</a> is an academic collection of essays I edited on <a href="http://www.radiohead.com/">Radiohead</a>. This academic work on Radiohead grew out of my web site <a href="http://pulk-pull.org/">Pulk-Pull*: An On-Going Investigation of the Music and Art of Radiohead</a>.</p>				
			
			<p>My Ph.D. dissertation was on  Shakespeare and early modern (Renaissance) English metrical practices. I have published an <a href="http://www.shu.ac.uk/emls/07-1/tatefeet.htm" title="Numme Feete: Meter in Early Modern England">article</a> on meter and I co-edit the journal <a href="http://oregonstate.edu/versif" title="an academic journal">Versification: An Electronic Journal of Literary Prosody</a>. As a research and teaching resource, I maintain an ever-changing list of links on <a href="http://students.washington.edu/jtate/shakren.html">Shakespeare and the English Early Modern Period</a>.</p>

			
				<p>The book <a href="https://www.ashgate.com/shopping/title.asp?key1=&amp;key2=&amp;orig=results&amp;isbn=0%207546%204116%203">Fecal Matters in Early Modern Literature and Art: Studies in Scatology</a> edited by Jeff Persels and Russell Ganim contains my essay on &quot;Tamburlaine's Urine.&quot; You can also read my page on <a href="http://students.washington.edu/jtate/uroscopy.html">Uroscopy in Early Modern England</a>. Uroscopy is the medical investigation of urine using sight, smell, and taste&mdash;yes, taste.</p>
			</div>

			<h3 class="display" title="here, there"><a href="#here,there">here, there, elsewhere...</a></h3>

			<div class="stretcher">
				<h2> you wrote a book on Radiohead? </h2>
		<ul>
		  <li>I edited a book on the band, to be more accurate, and all the contributions excelled my own. It is available in the <a href="http://www.amazon.com/exec/obidos/ASIN/0754639800/pulkpullanong-20/002-9414196-0296036?creative=125577&amp;camp=2321&amp;link_code=as1" title="buy, buy, buy">US</a>, the <a href="http://www.amazon.co.uk/exec/obidos/ASIN/0754639800/pulkpull-21/202-7024931-1267804" title="consume">UK</a> and <a href="http://www.amazon.co.jp/exec/obidos/ASIN/0754639800/ref=sr_aps_eb_1/249-0813653-0865154">Japan</a>, among many other places. There is even a <a href="http://pulk-pull.org/radiohead/book/introspan.html">Spanish translation</a> of the introduction. The book has received reviews positive and negative; one comment claimed the book tends to &quot;over-egg the academic pudding.&quot; I like that image, for some reason. </li>

    </ul>
	<h2>search</h2>
		<ul>
		  <li>Need to search this site? Well, too bad. No, just kidding. I need to re-enable this feature. </li>
    </ul>
		<h2>audio</h2>
		<ul>

		  <li>See what I'm hearing: if I'm listening <a href="http://josephtate.com/itunes.html">now</a>.  </li>
    </ul>
		<h2>links here</h2>
		<ul>
	      <li>
		  <a href="http://www.pulk-pull.org/" title="Pulk-Pull*: An on-going investigation of the music and art of Radiohead">Pulk-Pull*</a><br />

		  An on-going investigation of the music and art of Radiohead.</li>
	      <li><a href="http://josephtate.com/emma/" title="the adventures of Emma">The Adventures of Emma</a><br />
            Our baby girl born in September.</li>
	      </ul>
	    <h2> links there </h2>
        <ul>

          <li><a href="http://del.icio.us/josephtate" title="my bookmarks">del.icio.us/josephtate</a><br />
          My bookmarks. Eclectic and revealing. All too revealing. </li>
          <li><a href="http://www.artsjournal.com/" title="ArtsJournal.com web site">ArtsJournal.com</a><br />
  The daily digest of arts, culture, and ideas.</li>
          <li> <a href="http://www.ubu.com/">UbuWeb</a><br />
All forms of the avant-garde and beyond. I would choose to live in this world. </li>

          <li><a href="http://news.bbc.co.uk/" title="BBC world news web site">BBC World News</a><br />
Updated every minute of every day. Honestly. </li>
          <li><a href="http://www.radiohead.com/" title="Radiohead's official site, maintained by the band">Radiohead.com</a><br />
It is as if the bubble never burst. </li>
          <li><a href="http://www.metafilter.com/" title="Metafilter: you're wrong. no you're wrong!">Metafilter</a><br />
      A community weblog. No, it's <i>the</i> community weblog. I am user <a href="http://www.metafilter.com/user/14415">14415</a>. </li>

          <li><a href="http://www.kingdomofloathing.com/static.php?id=whatiskol">The Kingdom of Loathing</a><br />
            Online text-based gaming at its finest.
</li>
          <li><a href="http://www.hogwartslive.com/">Hogwarts Live</a><br />
           Even more online, text-based gaming at its finest. </li>
          </ul>
        <h2> friends</h2>

        <ul>
          <li>
    
<a href="http://www.cofc.edu/~francisc/" title="speak the truth to the people">Conseula Francis</a><br /> 
    Assistant Professor at the College of Charleston, editor of <a href="http://www.cofc.edu/%7Efrancisc/temples.html">Temples for Tomorrow</a>: An Online Project in African American Literature.</li>
          <li><a href="http://www.wsc.mass.edu/mfilas/" title="cyborgs and more">Michael Filas</a><br />
            Assistant Professor at Westfield State College.</li>

          <li><a href="http://homepage.mac.com/codywalker/Menu1.html">Cody Walker</a><br />
          A Band of Miserly Ghosts? A <a href="http://www.cortlandreview.com/issue/22/walker.html">poet</a> too: &quot;grope suits / On Scandinavian hookers.&quot; </li>
          <li>			<a href="http://arnettmuldrow.com/">Arnett Muldrow &amp; Associates</a>

            <br />
          City planning done really, really well.</li>
          <li><a href="http://www.xenocryst.art.pl/">xenocryst<br />
          </a>A crystal not derived from the magma that gave rise to the igneous rock containing it.</li>
          <li><a href="http://danilo.ariadoss.com/">Danilo Stern-Sapad aka Ariadoss</a><br />
             Featuring  general jabber and ostentatious prater done really, really well. </li>

        </ul>
        <h2>lists</h2>
        <ul><li><a href="http://www.amazon.com/o/registry/132RMS8X1ROK2" title="buy! buy! BUY!">My Amazon.com Wish List</a> <br />
            Buying extravagant gifts for me has never been easier.</li>
           <li>More lists are planned. Obviously, or the heading wouldn't be &quot;lists,&quot; plural, right? </li>

        </ul>
			</div>

		
</div>

	</div>
	
<script type="text/javascript">
		Element.cleanWhitespace('content');
		init();
	</script>

<p id="updated">jody updated this page late at night and/or <br />
   early in the morning on  
   <!-- #BeginDate format:lacAm3 -->mon, 04/03/2006<!-- #EndDate -->.<br />

   <br />
<img src="images/threefaces.png" width="82" height="26" /></p>
<p><img src="images/flatface.png" /></p>
<p>&nbsp; </p>
</div>
</td></tr></table>
<?php include ($ROOT."/includes/foot.php"); ?>
</body>

</html>
