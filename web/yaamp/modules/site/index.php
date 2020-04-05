<?php

$algo = user()->getState('yaamp-algo');

JavascriptFile("/extensions/jqplot/jquery.jqplot.js");
JavascriptFile("/extensions/jqplot/plugins/jqplot.dateAxisRenderer.js");
JavascriptFile("/extensions/jqplot/plugins/jqplot.barRenderer.js");
JavascriptFile("/extensions/jqplot/plugins/jqplot.highlighter.js");
JavascriptFile("/extensions/jqplot/plugins/jqplot.cursor.js");
JavascriptFile('/yaamp/ui/js/auto_refresh.js');

$height = '240px';

$min_payout = floatval(YAAMP_PAYMENTS_MINI);
$min_sunday = $min_payout/10;

$payout_freq = (YAAMP_PAYMENTS_FREQ / 3600)." hours";
?>

<div id='resume_update_button' style='color: #444; background-color: #ffd; border: 1px solid #eea;
	padding: 10px; margin-left: 20px; margin-right: 20px; margin-top: 15px; cursor: pointer; display: none;'
	onclick='auto_page_resume();' align=center>
	<b>Auto refresh is paused - Click to resume</b></div>

<table cellspacing=20 width=100%>
<tr><td valign=top width=50%>

<!--  -->

<div class="main-left-box">
<div class="main-left-title">PoolMine.xyz</div>
<div class="main-left-inner">

<ul>

<li >Welcome to PoolMine.xyz</li>
<li>&nbsp;</li>
<li><img src="/images/Logo.png" alt="image" /> <br/></li>
<li>&nbsp;</li>
<li>No registration is required, we do payouts in the currency you mine. Use your wallet address as the username.</li>
<li>&nbsp;</li>
<li>Payouts are made automatically every <?= $payout_freq ?> for all balances above <b><?= $min_payout ?></b>, or <b><?= $min_sunday ?></b> on Sunday.</li>
<li>For some coins, there is an initial delay before the first payout, please wait at least 6 hours before asking for support.</li>
<li>Blocks are distributed proportionally among valid submitted shares.</li>
<li>&nbsp;</li>
<li>&nbsp;</li>
<div>Use cpuminer-opt-rplant for mining Ring coin  <a href='https://github.com/rplant8/cpuminer-opt-rplant/releases/'> /github/cpuminer-opt-rplant </a></div>
<br/>

</ul>
</div></div>
<br/>

<!--  -->

<div class="main-left-box">
<div class="main-left-title">Miner Downloads</div>
<div class="main-left-inner">
<table>
  <tr>
    <td>
	<a href="https://github.com/rplant8/cpuminer-opt-rplant/releases/" target="_blank">cpuminer-rplant</a><br />
	<a href="https://github.com/doktor83/SRBMiner-Multi/releases/" target="_blank">SRBMiner-Multi</a><br />
	<a href="https://github.com/uspenko/cpuminer-multi/releases/" target="_blank">cpuminer-minotaur</a><br />
  	</td><td></td>
    <td>
      	<br />
	</td><td></td>
    <td>
	  
    <td>
      </td>
	</td>
  </tr>
</table>
</div></div>
<br/>

<!--  -->

<div class="main-left-box">
<div class="main-left-title">How to mine with PoolMine.xyz</div>
<div class="main-left-inner">

<ul>
<table>
<thead>
<tr>
<th>Miner</th>
<th>Stratum Region</th>
<th>Coin</th>
<th>Send BenchMark</th>
</tr>
</thead>
<tbody><tr>
<td>
<select id="drop-miner" >
	<option value="" disabled selected>Windows</option>
	<option value="cpuminer-sse2.exe">cpuminer-rplant</option>
	<option value="" disabled selected>Linux</option>
	<option value="./cpuminer">cpuminer-minotaur</option>
	</select>
</td>
<td>
<select id="drop-stratum" >
	<option value="region" disabled selected>Region</option>
	<option value="asia">ASIA</option>
	<option value="na">North America</option>
</select>
</td>
<td>
<select id="drop-coin">
<option data-port='port' data-algo="-a algo" data-symbol='symbol' disabled selected>Coin</option>
<option data-port='7018' data-algo='-a minotaur' data-symbol='RNG'>Ring (RNG)</option>
<option data-port='6235' data-algo='-a yespowerIC' data-symbol='ISO'>IsotopeC (ISO)</option>
<option data-port='6236' data-algo='-a yespowerr16' data-symbol='YTN'>Yenten (YTN)</option>
</select>
</td>
<td>
<select id="drop-bench">
	<option value="">No</option>
	<option value=",stats">Yes</option>
</select>
</td>
<thead>
<tr>
<th>Wallet Address</th>
<th>Rig Name</th>
</tr>
</thead>

<td>
<input id="text-wallet" type="text" placeholder="<Your-Wallet-Address>">
</td><td>
<input id="text-rig-name" type="text" placeholder="Rig-Name">
</td>
<td>
<input id="Generate!" type="button" value="Generate Command " onclick="generate()">
</td>
</tr>
<tr>
<td colspan="5">
<li>&nbsp;</li>
<li>Use Command line</li>
<p class="main-left-box" style="padding: 3px; background-color: #ffffee; font-family: monospace;" id="output">-a &lt;Algo&gt; -o stratum+tcp://&lt;Region&gt;.poolmine.xyz.com:&lt;PORT&gt; -u &lt;WALLET_ADDRESS&gt;.&lt;WORKER_NAME&gt; -p c=&lt;SYMBOL&gt;</p>
</td>
</tr>
</tbody></table>

<li>&lt;WALLET_ADDRESS&gt; should be valid for the currency you mine. <b>DO NOT USE a BTC address here, the auto exchange is disabled</b>!</li>
<li>As optional password, you can use <b>-p c=&lt;SYMBOL&gt;</b> if yiimp does not set the currency correctly on the Wallet page.</li>
<li>See the "Pool Status" area on the right for PORT numbers. Algorithms without associated coins are disabled.</li>

<br>

</ul>
</div></div><br>

<!--  -->

<div class="main-left-box">
<div class="main-left-title">LINKS</div>
<div class="main-left-inner">

<ul>

<!--<li><b>BitcoinTalk</b> - <a href='https://bitcointalk.org/index.php?topic=508786.0' target=_blank >https://bitcointalk.org/index.php?topic=508786.0</a></li>-->
<!--<li><b>IRC</b> - <a href='http://webchat.freenode.net/?channels=#yiimp' target=_blank >http://webchat.freenode.net/?channels=#yiimp</a></li>-->

<li><b>API</b> - <a href='/site/api'>http://<?= YAAMP_SITE_URL ?>/site/api</a></li>
<li><b>Difficulty</b> - <a href='/site/diff'>http://<?= YAAMP_SITE_URL ?>/site/diff</a></li>
<?php if (YIIMP_PUBLIC_BENCHMARK): ?>
<li><b>Benchmarks</b> - <a href='/site/benchmarks'>http://<?= YAAMP_SITE_URL ?>/site/benchmarks</a></li>
<?php endif; ?>

<?php if (YAAMP_ALLOW_EXCHANGE): ?>
<li><b>Algo Switching</b> - <a href='/site/multialgo'>http://<?= YAAMP_SITE_URL ?>/site/multialgo</a></li>
<?php endif; ?>

<br>

</ul>
</div></div><br>

<!--  -->

<a class="twitter-timeline" href="https://twitter.com/hashtag/YAAMP" data-widget-id="617405893039292417" data-chrome="transparent" height="450px" data-tweet-limit="3" data-aria-polite="polite">Tweets about #YAAMP</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</td><td valign=top>

<!--  -->

<div id='pool_current_results'>
<br><br><br><br><br><br><br><br><br><br>
</div>

<div id='pool_history_results'>
<br><br><br><br><br><br><br><br><br><br>
</div>

</td></tr></table>

<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>

<script>

function page_refresh()
{
	pool_current_refresh();
	pool_history_refresh();
}

function select_algo(algo)
{
	window.location.href = '/site/algo?algo='+algo+'&r=/';
}

////////////////////////////////////////////////////

function pool_current_ready(data)
{
	$('#pool_current_results').html(data);
}

function pool_current_refresh()
{
	var url = "/site/current_results";
	$.get(url, '', pool_current_ready);
}

////////////////////////////////////////////////////

function pool_history_ready(data)
{
	$('#pool_history_results').html(data);
}

function pool_history_refresh()
{
	var url = "/site/history_results";
	$.get(url, '', pool_history_ready);
}

</script>

<script>
function getLastUpdated(){
	var drop1 = document.getElementById('drop-stratum');
	var drop2 = document.getElementById('drop-coin');
	var drop3 = document.getElementById('drop-miner');
	var drop4 = document.getElementById('drop-bench');
	var rigName = document.getElementById('text-rig-name').value;
	var result = '';

	result += drop3.value  + ' ';
	result += drop2.options[drop2.selectedIndex].dataset.algo + ' -o stratum+tcp://';
	result += drop1.value + '.poolmine.xyz:';
	result += drop2.options[drop2.selectedIndex].dataset.port + ' -u ';
	result += document.getElementById('text-wallet').value;
	if (rigName) result += '.' + rigName;
	result += ' -p c=';
	result += drop2.options[drop2.selectedIndex].dataset.symbol;
	if (drop4) result += drop4.value;
	return result;
}
function generate(){
  	var result = getLastUpdated()
		document.getElementById('output').innerHTML = result;
}
generate();
</script>