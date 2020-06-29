const getImageUrl ={
	install: (Vue, options) => {
		Vue.prototype.$getImageUrl = (folder, size, attachment) => {
			return `/images/${folder}/${size}/${attachment}`
		}
	}
}

const getProductUrl ={
	install: (Vue, options) => {
		Vue.prototype.$getProductUrl = (slug) => {
			return `/producto/${slug}`
		}
	}
}

Vue.use(getImageUrl)
Vue.use(getProductUrl)