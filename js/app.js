const creatorBlocks = document.querySelectorAll('.creator-block')

for (let creator of creatorBlocks) {
	let openState = false
	let viewButton = creator.querySelector('button[bd-data="open-modal"]')
	let closeButton = creator.querySelector('a[bd-data="close-modal"]')
	let modalWindow = creator.querySelector('div[bd-data="modal-window"]')

	viewButton.addEventListener('click', (e) => {
		e.target.setAttribute('aria-expanded', 'true')
		closeButton.setAttribute('aria-expanded', 'true')
		modalWindow.style.display = 'flex'
		setTimeout(() => {
			modalWindow.style.opacity = 1
		}, 1)
	})

	closeButton.addEventListener('click', (e) => {
		modalWindow.style.opacity = 0
		setTimeout(() => {
			modalWindow.style.display = 'none'
		}, 500)
		e.target.setAttribute('aria-expanded', 'false')
		viewButton.setAttribute('aria-expanded', 'false')
	})
}
