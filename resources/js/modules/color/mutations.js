export function setColors(state, colors){
	state.colors = colors
}

export function setColor(state, color){
	state.selectedColor = color
}

export function colorsError( state, payload){
	// state.error = truestate.errorMessage = payload
	console.log('Error prro')
	state.colors = []
}
