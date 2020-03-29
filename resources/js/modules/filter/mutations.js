export function setCategory(state, category){
	state.selectedCategory = category
}

export function setColor(state, color){
	state.selectedColor = color
}

export function setWord(state, word){
	state.selectedWord = word
}

export function setUrl(state, [category, color, word]){

	let url

	if (word == '' && category == null && color == null) {
		url = `/api/search`
	}

	if (word != '' && category == null && color == null) {
		url = `/api/search?word=${word}`
	}

	if (word != '' && category != null && color == null) {
		url = `/api/search?word=${word}&category=${category}`
	}

	if (word != '' && category != null && color != null) {
		url = `/api/search?word=${word}&category=${category}&color=${color}`
	}

	if (word == '' && category != null && color != null) {
		url = `/api/search?category=${category}&color=${color}`
	}

	if (word == '' && category == null && color != null) {
		url = `/api/search?color=${color}`
	}

	if (word == '' && category != null && color == null) {
		url = `/api/search?category=${category}`
	}

	if (word != '' && category == null && color != null) {
		url = `/api/search?word=${word}&color=${color}`
	}
	console.log('esta es la url ', url)

	state.selectedUrl = url
}
