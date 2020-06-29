export function setCategory(state, category){
	state.selectedCategory = category
}

export function setWord(state, word){
	state.selectedWord = word
}

export function setUrl(state, [category, word]){

	let url

	if (word == '' && category == null) {
		url = `/api/search`
	}

	if (word != '' && category == null) {
		url = `/api/search?word=${word}`
	}

	if (word != '' && category != null) {
		url = `/api/category/${category}/search?word=${word}`
	}

	if (word == '' && category != null) {
		url = `/api/category/${category}/search`
	}

	// console.log('esta es la url ', url)

	state.selectedUrl = url
}
