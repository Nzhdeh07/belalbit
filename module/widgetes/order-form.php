<div style="display: none;" id="order-form" class="bg-white p-8 rounded-2xl shadow-2xl w-1/2">
    <h2 class="text-3xl font-bold mb-6 text-center">Оформить заказ</h2>
    <form id="orderForm" action="<?php echo get_template_directory_uri(); ?>/send-order.php" method="post">
        <!-- Поле для телефона -->
        <div class="mb-6">
            <label for="phone" class="block text-lg font-medium text-gray-700">Телефон</label>
            <input type="text" id="phone" name="phone" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" required>
        </div>

        <!-- Поле для комментария -->
        <div class="mb-6">
            <label for="comment" class="block text-lg font-medium text-gray-700">Комментарий</label>
            <textarea id="comment" name="comment" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" placeholder="Напишите ваш комментарий..."></textarea>
        </div>

        <!-- Скрытые поля для ID и названия товара -->
        <input type="hidden" id="product-id" name="product_id" value="41234214">
        <input type="hidden" id="product-name" name="product_name" value="32141411">

        <div class="text-center">
            <button id="submitButton" type="submit" class="bg-rose-500  hover:bg-rose-600 text-white font-bold py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                Отправить заказ
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('orderForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const submitButton = document.getElementById('submitButton');
        const formData = new FormData(this);
        const orderForm = document.getElementById('order-form');

        fetch('<?php echo get_template_directory_uri(); ?>/send-order.php', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (response.ok) {
                    submitButton.textContent = 'Заказ отправлен';
                    submitButton.classList.remove('bg-rose-500', 'hover:bg-rose-600');
                    submitButton.classList.add('bg-green-500', 'text-white');

                    setTimeout(() => {
                        document.getElementById('orderForm').reset();
                        submitButton.textContent = 'Отправить заказ';
                        submitButton.classList.remove('bg-green-500');
                        submitButton.classList.add('bg-rose-500', 'hover:bg-rose-600');

                    }, 1000);
                } else {
                    alert('Ошибка при отправке заказа. Попробуйте еще раз.');
                }
            })
            .catch(error => {
                console.error('Ошибка:', error);
                alert('Ошибка при отправке заказа. Попробуйте еще раз.');
            });
    });

</script>
