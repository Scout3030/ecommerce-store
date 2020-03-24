@can('review', $product)
<div class="col-lg-6">
	<div class="review_box">
		<h4>¿Qué tal te pareció nuestro producto?</h4>
		<p>Tu Rating:</p>
		<ul class="list" id="list_rating" style="cursor: pointer;">
			<li data-number="1"><a href="javascript:void(0)"><i class="fa fa-star"></i></a></li>
			<li data-number="2"><i class="fa fa-star"></i></li>
			<li data-number="3"><i class="fa fa-star"></i></li>
			<li data-number="4"><i class="fa fa-star"></i></li>
			<li data-number="5"><i class="fa fa-star"></i></li>
		</ul>
		<p>Excelente</p>
		<form method="POST"
			action="{{ route('product.add_review') }}"
			class="form-contact form-review mt-3"
			id="rating_form">
			@csrf
			<input type="hidden" name="rating_input" value="1" />
            <input type="hidden" name="product_id" value="{{ $product->id }}" />
			<div class="form-group">
				<input class="form-control" name="name" type="text" placeholder="Ingresa tu nombre" required>
			</div>
			<div class="form-group">
				<input class="form-control" name="email" type="email" placeholder="Ingresa tu correo" required>
			</div>
			<div class="form-group">
				<textarea class="form-control different-control w-100" name="message" id="textarea" cols="30" rows="5" placeholder="Ingresa tu comentario"></textarea>
			</div>
			<div class="form-group text-center text-md-right mt-3">
				<button type="submit" class="button button--active button-review">Enviar opinión</button>
			</div>
		</form>
	</div>
</div>
@endcan

@push('scripts')
    <script>
        jQuery(document).ready(function() {
            const ratingSelector = jQuery('#list_rating');
            ratingSelector.find('li').on('click', function () {
                const number = $(this).data('number');
                $("#rating_form").find('input[name=rating_input]').val(number);
                // ratingSelector.find('li i').each(function(index) {
                //     if ((index + 1) <= number) {
                //         // $(this).addClass('yellow');
                //         $(this).append('<a href="javascript:void(0)"><i class="fa fa-star"></i></a>')
                //         $(this).remove()
                //         // $(this).removeChild(this.lastElementChild);
                //     }
                // })
            })
        });
    </script>
@endpush