const creatorBlocks = document.querySelectorAll('.creator-block')

for (let creator of creatorBlocks) {
	let viewButton = creator.querySelector('button[bd-data="open-modal"]')
	let closeButton = creator.querySelector('a[bd-data="close-modal"]')
	let overlay = creator.querySelector('.creator-block_modal_overlay')
	let modalWindow = creator.querySelector('div[bd-data="modal-window"]')

	const openModal = () => {
		viewButton.setAttribute('aria-expanded', 'true')
		closeButton.setAttribute('aria-expanded', 'true')
		modalWindow.style.display = 'flex'
		setTimeout(() => {
			modalWindow.style.opacity = 1
		}, 1)
	}

	const closeModal = () => {
		modalWindow.style.opacity = 0
		setTimeout(() => {
			modalWindow.style.display = 'none'
		}, 500)
		closeButton.setAttribute('aria-expanded', 'false')
		viewButton.setAttribute('aria-expanded', 'false')
	}

	viewButton.addEventListener('click', (e) => {
		openModal()
	})

	closeButton.addEventListener('click', () => {
		closeModal()
	})

	overlay.addEventListener('click', () => {
		closeModal()
	})
}
