var twOptions = {
	width: '100%',
	height: '372',
	theme: 'light',
	autoplay: false,
	parent: [`${twitch.site_parsed}`],
}

if (twitch.winner_mode == '1') {
	twOptions.video = '1191569227'
} else {
	twOptions.channel = 'hyperx'
}

var twitchPlayer = new Twitch.Player('twitch-embed', twOptions)
