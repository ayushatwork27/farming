<h3>Your Qr Code</h3>

<div>
	{{ $body }}
</div>
<div>
	<image src={!! "http://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=$qr_code" !!}>
</div>
<p>Send Via DigiEntry </p>
