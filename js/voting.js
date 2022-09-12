var voteCount = 0
if (!isNaN(parseInt(bloginfo.vote_count))) {
	voteCount = parseInt(bloginfo.vote_count)
}

var voteSelectorBtns = document.querySelectorAll('.vote-select')

for (var i = 0; i < voteSelectorBtns.length; i++) {
	voteSelectorBtns[i].addEventListener('click', function (e) {
		var creatorId = e.target.getAttribute('creator-id')

		fetch(
			bloginfo.site_url +
				'/wp-json/voting/v2/vote/' +
				bloginfo.user_id +
				'/' +
				creatorId +
				'/' +
				bloginfo.today +
				'/'
		).then((response) => {
			console.log(response)
		})

		e.target.childNodes[0].nodeValue = 'Voted!'
		e.target.setAttribute('disabled', '')
		e.target.setAttribute('data-voted', 'true')
		e.target.classList.add('voted')

		voteCount += 1

		if (voteCount >= 5) {
			disableVoteBtns()
			alert(
				'You have cast all your votes for today! Come back tomorrow to cast more votes!'
			)
		}
	})
}

function disableVoteBtns() {
	for (var i = 0; i < voteSelectorBtns.length; i++) {
		if (voteSelectorBtns[i].getAttribute('data-voted') != 'true') {
			voteSelectorBtns[i].childNodes[0].nodeValue = 'Voted!'
			voteSelectorBtns[i].classList.add('voted-grey')
			voteSelectorBtns[i].setAttribute('disabled', '')
		}
	}
}

if (reloadVotes >= 5) {
	disableVoteBtns()
}
