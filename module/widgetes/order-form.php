<div style="display: none;" id="contact-modal" class="flex flex-col gap-5 p-5 rounded-md">
    <div class="modal-content">
        <p class="text-center font-medium text-[32px] leading-[48px] text-black">Связаться</p>
        <form class="flex flex-col gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="number"
                       class="block font-medium text-[12px] leading-3 text-customGray-black">Телефон</label>
                <input type="text" id="number" placeholder="+375 (__) ___-__-__" pattern="^\+375\d{9}$"
                       class="w-full px-3 py-2 border border-solid border-customBlue rounded-md"
                       required/>
            </div>
            <div class="flex flex-col gap-1.5">
                <label for="message"
                       class="block font-medium text-[12px] leading-3 text-customGray-black">Комментарий</label>
                <textarea id="message" class="w-full px-3 py-2 border border-solid border-customBlue rounded-md"
                          required></textarea>
                <button type="submit"
                        class="py-2 px-4 bg-customGreen-normal rounded-md font-medium text-[16px] leading-6 text-white">
                    Отправить
                </button>
            </div>


            <div class="flex flex-col gap-2.5">
                <div class="flex items-center justify-center ">
                    <div class="flex-grow border-t border-gray-300"></div>
                    <span class="py-0.5 px-2 bg-customBlue rounded-md font-medium text-[12px] leading-5 text-white">или</span>
                    <div class="flex-grow border-t border-gray-300"></div>
                </div>

                <div class="flex flex-col gap-[5px] items-center">
                    <div class="flex gap-[5px] items-center">
                        <svg width="14" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.137 12.194C14.018 12.446 13.864 12.684 13.661 12.908C13.318 13.286 12.94 13.559 12.513 13.734C12.093 13.909 11.638 14 11.148 14C10.434 14 9.67101 13.832 8.86601 13.489C8.06101 13.146 7.25601 12.684 6.45801 12.103C5.65301 11.515 4.89001 10.864 4.16201 10.143C3.44101 9.415 2.79001 8.652 2.20901 7.854C1.63501 7.056 1.17301 6.258 0.837008 5.467C0.501008 4.669 0.333008 3.906 0.333008 3.178C0.333008 2.702 0.417008 2.247 0.585008 1.827C0.753008 1.4 1.01901 1.008 1.39001 0.658C1.83801 0.217 2.32801 0 2.84601 0C3.04201 0 3.23801 0.042 3.41301 0.126C3.59501 0.21 3.75601 0.336 3.88201 0.518L5.50601 2.807C5.63201 2.982 5.72301 3.143 5.78601 3.297C5.84901 3.444 5.88401 3.591 5.88401 3.724C5.88401 3.892 5.83501 4.06 5.73701 4.221C5.64601 4.382 5.51301 4.55 5.34501 4.718L4.81301 5.271C4.73601 5.348 4.70101 5.439 4.70101 5.551C4.70101 5.607 4.70801 5.656 4.72201 5.712C4.74301 5.768 4.76401 5.81 4.77801 5.852C4.90401 6.083 5.12101 6.384 5.42901 6.748C5.74401 7.112 6.08001 7.483 6.44401 7.854C6.82201 8.225 7.18601 8.568 7.55701 8.883C7.92101 9.191 8.22201 9.401 8.46001 9.527C8.49501 9.541 8.53701 9.562 8.58601 9.583C8.64201 9.604 8.69801 9.611 8.76101 9.611C8.88001 9.611 8.97101 9.569 9.04801 9.492L9.58001 8.967C9.75501 8.792 9.92301 8.659 10.084 8.575C10.245 8.477 10.406 8.428 10.581 8.428C10.714 8.428 10.854 8.456 11.008 8.519C11.162 8.582 11.323 8.673 11.498 8.792L13.815 10.437C13.997 10.563 14.123 10.71 14.2 10.885C14.27 11.06 14.312 11.235 14.312 11.431C14.312 11.683 14.256 11.942 14.137 12.194Z"
                                  fill="#4E4E4E"/>
                        </svg>
                        <p class="font-semibold text-[16px] leading-5 text-customGray-contact"><?php echo get_field('contact-1', 'options') ?></p>
                    </div>


                    <div class="flex gap-[5px] items-center">
                        <svg width="16" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M5.50667 1.33301C3.66667 1.33301 3 1.99967 3 3.87301V12.1263C3 13.9997 3.66667 14.6663 5.50667 14.6663H11.1533C13 14.6663 13.6667 13.9997 13.6667 12.1263V3.87301C13.6667 1.99967 13 1.33301 11.16 1.33301H5.50667ZM7.16667 11.6997C7.16667 11.0597 7.69333 10.533 8.33333 10.533C8.97333 10.533 9.5 11.0597 9.5 11.6997C9.5 12.3397 8.97333 12.8663 8.33333 12.8663C7.69333 12.8663 7.16667 12.3397 7.16667 11.6997ZM7 4.16634C6.72667 4.16634 6.5 3.93967 6.5 3.66634C6.5 3.39301 6.72667 3.16634 7 3.16634H9.66667C9.94 3.16634 10.1667 3.39301 10.1667 3.66634C10.1667 3.93967 9.94 4.16634 9.66667 4.16634H7Z"
                                  fill="#4E4E4E"/>
                        </svg>
                        <p class="font-semibold text-[16px] leading-5 text-customGray-contact"><?php echo get_field('contact-2', 'options') ?></p>
                    </div>
                </div>

                <div class="flex gap-[5px] items-center justify-center">
                    <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/sms.svg'; ?>"
                         alt="mobile">
                    <p class="font-semibold text-[16px] leading-5 text-customGray"><?php echo get_field('mail', 'options') ?></p>
                </div>
            </div>


            <div class="flex justify-center items-center gap-2.5">
                <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/instagram.svg'; ?>"
                     alt="mobile">
                <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/viber.svg'; ?>"
                     alt="mobile">
                <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/whatsapp.svg'; ?>"
                     alt="mobile">
                <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/telegram.svg'; ?>"
                     alt="mobile">
            </div>
        </form>
    </div>
</div>


<div style="display: none;" id="buy" class="flex flex-col gap-5 p-5 rounded-md">
    <div class="modal-content">
        <p class="text-center font-medium text-[32px] leading-[48px] text-black">Заказать</p>
        <form class="flex flex-col gap-5">

            <input type="hidden" id="productId" name="productId"/>
            <input type="hidden" id="productUrl" name="product-url"/>
            <input type="hidden" id="productTitle" name="productTitle"/>
            <input type="hidden" id="productPrice" name="productPrice"/>
            <input type="hidden" name="form_subject" value="Заказать товар"/>


            <label class="flex flex-col gap-1.5">
                <span class="block font-medium text-[12px] leading-3 text-customGray-black">Телефон</span>
                <input type="text" name="tel" placeholder="+375 (__) ___-__-__" pattern="^\+375\d{9}$"
                       class="w-full px-3 py-2 border border-solid border-customBlue rounded-md"
                       required/>
            </label>
            <div class="flex flex-col gap-1.5">
                <label for="message"
                       class="block font-medium text-[12px] leading-3 text-customGray-black">Комментарий</label>
                <textarea id="message" class="w-full px-3 py-2 border border-solid border-customBlue rounded-md"
                          required></textarea>
                <button type="submit"
                        class="py-2 px-4 bg-customGreen-normal rounded-md font-medium text-[16px] leading-6 text-white">
                    Отправить
                </button>
            </div>


            <div class="flex flex-col gap-2.5">
                <div class="flex items-center justify-center ">
                    <div class="flex-grow border-t border-gray-300"></div>
                    <span class="py-0.5 px-2 bg-customBlue rounded-md font-medium text-[12px] leading-5 text-white">или</span>
                    <div class="flex-grow border-t border-gray-300"></div>
                </div>

                <div class="flex flex-col gap-[5px] items-center">
                    <div class="flex gap-[5px] items-center">
                        <svg width="14" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.137 12.194C14.018 12.446 13.864 12.684 13.661 12.908C13.318 13.286 12.94 13.559 12.513 13.734C12.093 13.909 11.638 14 11.148 14C10.434 14 9.67101 13.832 8.86601 13.489C8.06101 13.146 7.25601 12.684 6.45801 12.103C5.65301 11.515 4.89001 10.864 4.16201 10.143C3.44101 9.415 2.79001 8.652 2.20901 7.854C1.63501 7.056 1.17301 6.258 0.837008 5.467C0.501008 4.669 0.333008 3.906 0.333008 3.178C0.333008 2.702 0.417008 2.247 0.585008 1.827C0.753008 1.4 1.01901 1.008 1.39001 0.658C1.83801 0.217 2.32801 0 2.84601 0C3.04201 0 3.23801 0.042 3.41301 0.126C3.59501 0.21 3.75601 0.336 3.88201 0.518L5.50601 2.807C5.63201 2.982 5.72301 3.143 5.78601 3.297C5.84901 3.444 5.88401 3.591 5.88401 3.724C5.88401 3.892 5.83501 4.06 5.73701 4.221C5.64601 4.382 5.51301 4.55 5.34501 4.718L4.81301 5.271C4.73601 5.348 4.70101 5.439 4.70101 5.551C4.70101 5.607 4.70801 5.656 4.72201 5.712C4.74301 5.768 4.76401 5.81 4.77801 5.852C4.90401 6.083 5.12101 6.384 5.42901 6.748C5.74401 7.112 6.08001 7.483 6.44401 7.854C6.82201 8.225 7.18601 8.568 7.55701 8.883C7.92101 9.191 8.22201 9.401 8.46001 9.527C8.49501 9.541 8.53701 9.562 8.58601 9.583C8.64201 9.604 8.69801 9.611 8.76101 9.611C8.88001 9.611 8.97101 9.569 9.04801 9.492L9.58001 8.967C9.75501 8.792 9.92301 8.659 10.084 8.575C10.245 8.477 10.406 8.428 10.581 8.428C10.714 8.428 10.854 8.456 11.008 8.519C11.162 8.582 11.323 8.673 11.498 8.792L13.815 10.437C13.997 10.563 14.123 10.71 14.2 10.885C14.27 11.06 14.312 11.235 14.312 11.431C14.312 11.683 14.256 11.942 14.137 12.194Z"
                                  fill="#4E4E4E"/>
                        </svg>
                        <p class="font-semibold text-[16px] leading-5 text-customGray-contact"><?php echo get_field('contact-1', 'options') ?></p>
                    </div>


                    <div class="flex gap-[5px] items-center">
                        <svg width="16" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M5.50667 1.33301C3.66667 1.33301 3 1.99967 3 3.87301V12.1263C3 13.9997 3.66667 14.6663 5.50667 14.6663H11.1533C13 14.6663 13.6667 13.9997 13.6667 12.1263V3.87301C13.6667 1.99967 13 1.33301 11.16 1.33301H5.50667ZM7.16667 11.6997C7.16667 11.0597 7.69333 10.533 8.33333 10.533C8.97333 10.533 9.5 11.0597 9.5 11.6997C9.5 12.3397 8.97333 12.8663 8.33333 12.8663C7.69333 12.8663 7.16667 12.3397 7.16667 11.6997ZM7 4.16634C6.72667 4.16634 6.5 3.93967 6.5 3.66634C6.5 3.39301 6.72667 3.16634 7 3.16634H9.66667C9.94 3.16634 10.1667 3.39301 10.1667 3.66634C10.1667 3.93967 9.94 4.16634 9.66667 4.16634H7Z"
                                  fill="#4E4E4E"/>
                        </svg>
                        <p class="font-semibold text-[16px] leading-5 text-customGray-contact"><?php echo get_field('contact-2', 'options') ?></p>
                    </div>
                </div>

                <div class="flex gap-[5px] items-center justify-center">
                    <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/sms.svg'; ?>"
                         alt="mobile">
                    <p class="font-semibold text-[16px] leading-5 text-customGray"><?php echo get_field('mail', 'options') ?></p>
                </div>
            </div>


            <div class="flex justify-center items-center gap-2.5">
                <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/instagram.svg'; ?>"
                     alt="mobile">
                <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/viber.svg'; ?>"
                     alt="mobile">
                <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/whatsapp.svg'; ?>"
                     alt="mobile">
                <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/telegram.svg'; ?>"
                     alt="mobile">
            </div>
        </form>
    </div>
</div>

<div style="display: none;" id="price" class="flex flex-col gap-5 p-5 rounded-md">
    <div class="modal-content">
        <p class="text-center font-medium text-[32px] leading-[48px] text-black">Узнать цену</p>
        <form class="flex flex-col gap-5">
            <div class="flex flex-col gap-1.5">
                <label for="number"
                       class="block font-medium text-[12px] leading-3 text-customGray-black">Телефон</label>
                <input type="text" id="number" placeholder="+375 (__) ___-__-__" pattern="^\+375\d{9}$"
                       class="w-full px-3 py-2 border border-solid border-customBlue rounded-md"
                       required/>
            </div>
            <div class="flex flex-col gap-1.5">
                <button type="submit"
                        class="py-2 px-4 bg-customGreen-normal rounded-md font-medium text-[16px] leading-6 text-white">
                    Отправить
                </button>
            </div>


            <div class="flex flex-col gap-2.5">
                <div class="flex items-center justify-center ">
                    <div class="flex-grow border-t border-gray-300"></div>
                    <span class="py-0.5 px-2 bg-customBlue rounded-md font-medium text-[12px] leading-5 text-white">или</span>
                    <div class="flex-grow border-t border-gray-300"></div>
                </div>

                <div class="flex flex-col gap-[5px] items-center">
                    <div class="flex gap-[5px] items-center">
                        <svg width="14" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.137 12.194C14.018 12.446 13.864 12.684 13.661 12.908C13.318 13.286 12.94 13.559 12.513 13.734C12.093 13.909 11.638 14 11.148 14C10.434 14 9.67101 13.832 8.86601 13.489C8.06101 13.146 7.25601 12.684 6.45801 12.103C5.65301 11.515 4.89001 10.864 4.16201 10.143C3.44101 9.415 2.79001 8.652 2.20901 7.854C1.63501 7.056 1.17301 6.258 0.837008 5.467C0.501008 4.669 0.333008 3.906 0.333008 3.178C0.333008 2.702 0.417008 2.247 0.585008 1.827C0.753008 1.4 1.01901 1.008 1.39001 0.658C1.83801 0.217 2.32801 0 2.84601 0C3.04201 0 3.23801 0.042 3.41301 0.126C3.59501 0.21 3.75601 0.336 3.88201 0.518L5.50601 2.807C5.63201 2.982 5.72301 3.143 5.78601 3.297C5.84901 3.444 5.88401 3.591 5.88401 3.724C5.88401 3.892 5.83501 4.06 5.73701 4.221C5.64601 4.382 5.51301 4.55 5.34501 4.718L4.81301 5.271C4.73601 5.348 4.70101 5.439 4.70101 5.551C4.70101 5.607 4.70801 5.656 4.72201 5.712C4.74301 5.768 4.76401 5.81 4.77801 5.852C4.90401 6.083 5.12101 6.384 5.42901 6.748C5.74401 7.112 6.08001 7.483 6.44401 7.854C6.82201 8.225 7.18601 8.568 7.55701 8.883C7.92101 9.191 8.22201 9.401 8.46001 9.527C8.49501 9.541 8.53701 9.562 8.58601 9.583C8.64201 9.604 8.69801 9.611 8.76101 9.611C8.88001 9.611 8.97101 9.569 9.04801 9.492L9.58001 8.967C9.75501 8.792 9.92301 8.659 10.084 8.575C10.245 8.477 10.406 8.428 10.581 8.428C10.714 8.428 10.854 8.456 11.008 8.519C11.162 8.582 11.323 8.673 11.498 8.792L13.815 10.437C13.997 10.563 14.123 10.71 14.2 10.885C14.27 11.06 14.312 11.235 14.312 11.431C14.312 11.683 14.256 11.942 14.137 12.194Z"
                                  fill="#4E4E4E"/>
                        </svg>
                        <p class="font-semibold text-[16px] leading-5 text-customGray-contact"><?php echo get_field('contact-1', 'options') ?></p>
                    </div>


                    <div class="flex gap-[5px] items-center">
                        <svg width="16" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M5.50667 1.33301C3.66667 1.33301 3 1.99967 3 3.87301V12.1263C3 13.9997 3.66667 14.6663 5.50667 14.6663H11.1533C13 14.6663 13.6667 13.9997 13.6667 12.1263V3.87301C13.6667 1.99967 13 1.33301 11.16 1.33301H5.50667ZM7.16667 11.6997C7.16667 11.0597 7.69333 10.533 8.33333 10.533C8.97333 10.533 9.5 11.0597 9.5 11.6997C9.5 12.3397 8.97333 12.8663 8.33333 12.8663C7.69333 12.8663 7.16667 12.3397 7.16667 11.6997ZM7 4.16634C6.72667 4.16634 6.5 3.93967 6.5 3.66634C6.5 3.39301 6.72667 3.16634 7 3.16634H9.66667C9.94 3.16634 10.1667 3.39301 10.1667 3.66634C10.1667 3.93967 9.94 4.16634 9.66667 4.16634H7Z"
                                  fill="#4E4E4E"/>
                        </svg>
                        <p class="font-semibold text-[16px] leading-5 text-customGray-contact"><?php echo get_field('contact-2', 'options') ?></p>
                    </div>
                </div>

                <div class="flex gap-[5px] items-center justify-center">
                    <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/sms.svg'; ?>"
                         alt="mobile">
                    <p class="font-semibold text-[16px] leading-5 text-customGray"><?php echo get_field('mail', 'options') ?></p>
                </div>
            </div>


            <div class="flex justify-center items-center gap-2.5">
                <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/instagram.svg'; ?>"
                     alt="mobile">
                <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/viber.svg'; ?>"
                     alt="mobile">
                <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/whatsapp.svg'; ?>"
                     alt="mobile">
                <img class="" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/telegram.svg'; ?>"
                     alt="mobile">
            </div>
        </form>
    </div>
</div>