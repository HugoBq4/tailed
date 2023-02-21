@extends('padrao.layout')

@section('titulo')
    Registro de usuário
@endsection

@section('conteudo')
    <div class="container pos-container">
        <div class="card bg-30 border-all-60">
            <div class="pd-container">
                <div class="pd-input-buttons">
                    <ul class="nav nav-pills nav-justified nav-style-2 mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link border-all-60" href="{{route('login')}}">Login</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link border-all-60 active" id="tab-register" data-mdb-toggle="pill"
                               href="{{route('register')}}">Registrar</a>
                        </li>
                    </ul>
                </div>
                <form id="registrar" autocomplete="off">
                    <div class="row pd-input">
                        <div class="col-12 form-default">
                            <input type="text" name="name" id="name" placeholder="nick *" value="">
                        </div>
                        <div class="col-12 form-default">
                            <input type="text" name="email" id="email" placeholder="email *" value="">
                        </div>
                        <div class="col-12 form-default">
                            <input type="password" name="password" id="password" placeholder="senha *" value="">
                        </div>
                        <div class="col-12 form-default">
                            <input type="password" name="confirmPassword" id="confirmPassword"
                                   placeholder="confirmar senha *" value="">
                        </div>
                        <div class="col-12 form-default">
                            <input name="birthday" id="birthday" type="date">
                        </div>
                        <div class="col-12">
                            <div class="useful-datepicker" style="margin: 0 auto 30px auto">
                                <div class="popover">
                                    <div class="solar-system">
                                        <div class="rotate">
                                            <svg class="solar-system-dash" viewBox="0 0 162 162">
                                                <circle cx="81" cy="81" r="80" stroke-dasharray="3 3"/>
                                            </svg>
                                            <div class="earth">
                                                <svg class="earth-dash" viewBox="0 0 43 43">
                                                    <circle cx="21.5" cy="21.5" r="20.5" stroke-dasharray="3 3"/>
                                                </svg>

                                                <svg class="earth-planet" viewBox="0 0 19 19">
                                                    <path
                                                        d="M9.5 19C14.7467 19 19 14.7467 19 9.5C19 4.25329 14.7467 0 9.5 0C4.25329 0 0 4.25329 0 9.5C0 14.7467 4.25329 19 9.5 19Z"
                                                        fill="#C8E4FF"
                                                    />
                                                    <g fill="#72D172">
                                                        <path
                                                            d="M3.88471e-06 9.50009C-0.00121476 10.846 0.2843 12.1767 0.837539 13.4036C1.39078 14.6305 2.19905 15.7255 3.20852 16.6156L4.04783 15.357C4.04783 15.357 4.64757 15.184 4.77685 14.9519C5.18163 14.2232 4.46294 12.9548 4.46294 12.9548C4.4481 12.6508 4.39962 12.3493 4.31837 12.056C4.21016 11.7863 3.4547 11.4166 3.4547 11.4166C3.4547 11.4166 2.72609 10.2291 2.72609 9.50009C2.71336 9.21423 2.81394 8.9349 3.00597 8.72276C3.198 8.51063 3.46597 8.38282 3.75168 8.36711C3.9927 8.31603 4.22042 8.21522 4.42027 8.07113C4.62012 7.92703 4.78771 7.74283 4.91233 7.53029C4.91233 7.53029 5.83011 7.287 6.04572 6.91072C6.26133 6.53444 5.80326 5.18626 5.80326 5.18626C5.88811 4.83015 5.88499 4.45873 5.79418 4.10409C5.64364 3.77618 5.40909 3.4939 5.11431 3.28585C4.87739 2.69347 4.51691 2.15839 4.05692 1.71629C2.80371 2.59098 1.78039 3.7555 1.07404 5.11074C0.367688 6.46599 -0.000776505 7.97182 3.88471e-06 9.50009Z"
                                                        />
                                                        <path
                                                            d="M9.50212 5.57796e-06C9.24603 5.57796e-06 8.99325 0.013223 8.74253 0.0330491C8.65993 0.288723 8.23408 0.945049 8.34147 1.2412C8.44886 1.53735 9.33071 1.81285 9.33071 1.81285C9.33071 1.81285 9.09692 2.72609 9.50212 3.04951C9.90732 3.37292 10.555 2.9417 10.7974 3.02266C11.0399 3.10361 10.9862 4.69548 10.9862 4.69548C10.9862 4.69548 11.7689 5.55916 12.5384 5.66737C13.3079 5.77559 14.4797 4.46955 14.4797 4.46955C15.3411 4.27363 16.184 4.00416 16.9993 3.66411C16.1119 2.52197 14.975 1.59799 13.6755 0.962895C12.376 0.327803 10.9485 -0.00156322 9.50212 5.57796e-06Z"
                                                        />
                                                        <path
                                                            d="M16.4621 10.1194C16.6782 10.6324 16.0565 11.9418 15.5444 12.1975C15.0201 12.4355 14.5631 12.8 14.2144 13.2582C14.0252 13.5551 13.7769 14.7798 13.1565 15.0227C12.5362 15.2655 11.0645 16.6509 10.2818 16.4349C9.49905 16.2188 9.49905 14.3577 10.0389 13.5209C10.3611 13.0215 9.98479 11.9286 9.95629 11.551C9.92779 11.1735 8.79688 10.4714 8.79688 10.0938C8.79688 9.49987 10.0922 7.93444 10.0922 7.93444C10.0922 7.93444 11.1537 7.58376 11.4775 7.66472C11.8049 7.78379 12.1187 7.93749 12.4135 8.1232C12.9843 8.1658 13.5469 8.28371 14.0867 8.47387L14.7063 9.04057C14.7063 9.04057 16.2461 9.60768 16.4621 10.1194Z"
                                                        />
                                                    </g>
                                                </svg>

                                                <div class="moon"></div>
                                            </div>
                                        </div>
                                        <div class="sun">
                                            <div class="blur blur-1"></div>
                                            <div class="blur blur-2"></div>
                                            <div class="blur blur-3"></div>

                                            <svg viewBox="0 0 40 40">
                                                <circle cx="20" cy="20" r="20" fill="#FCD385"/>
                                                <circle
                                                    cx="20"
                                                    cy="20"
                                                    r="19.5"
                                                    stroke="white"
                                                    stroke-opacity="0.3"
                                                />
                                                <g fill="#FCBF77">
                                                    <path
                                                        d="M31.6474 19.233C31.3129 17.5605 32.5922 16 34.2978 16C35.7906 16 37.0008 17.2101 37.0008 18.7029V20.1926C37.0008 20.726 36.899 21.2544 36.7009 21.7497L35.2287 25.4303C35.0792 25.8039 34.8369 26.1332 34.5245 26.387C32.6032 27.9481 29.879 25.8801 30.8661 23.6098L31.6457 21.8166C31.8769 21.285 31.9398 20.6953 31.8261 20.1269L31.6474 19.233Z"
                                                    />
                                                    <path
                                                        d="M14.6532 30.036C16.8152 31.2915 18.3275 31.703 17.546 33.2191C16.862 34.546 13.8199 35.0027 12.4931 34.3187L11.557 33.8432C10.4128 33.2621 9.4315 32.405 8.70164 31.3495C7.48731 29.5933 6.90159 27.3419 7.83587 25.4221C8.3284 24.41 8.95903 23.746 9.64435 24.5854L10.5166 25.6536C10.7593 25.9508 10.9783 26.2648 11.1956 26.581C11.7656 27.4107 13.0595 29.1106 14.6532 30.036Z"
                                                    />
                                                    <path
                                                        d="M18.0002 14.5C18.0002 16.433 13.9341 19.5 12.0011 19.5C10.0681 19.5 10.4996 16.5 11.0002 14.5C11.5008 12.5 12.5672 11 14.5002 11C16.4332 11 18.0002 12.567 18.0002 14.5Z"
                                                    />
                                                    <path
                                                        d="M19.0008 9C19.0008 9.55228 18.5531 10 18.0008 10C17.4485 10 17.0008 9.55228 17.0008 9C17.0008 8.44772 17.4485 8 18.0008 8C18.5531 8 19.0008 8.44772 19.0008 9Z"
                                                    />
                                                    <path
                                                        d="M21.0008 12.5C21.0008 13.3284 20.5531 14 20.0008 14C19.4485 14 19.0008 13.3284 19.0008 12.5C19.0008 11.6716 19.4485 11 20.0008 11C20.5531 11 21.0008 11.6716 21.0008 12.5Z"
                                                    />
                                                    <path
                                                        d="M30.2809 20.9041C30.0982 21.7122 29.5134 22.2685 28.9747 22.1467C28.436 22.0249 28.1474 21.2711 28.3301 20.4631C28.5128 19.655 29.0976 19.0987 29.6363 19.2205C30.175 19.3423 30.4636 20.0961 30.2809 20.9041Z"
                                                    />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 form-default">
                            <input type="checkbox" id="politic" name="politic" role="checkbox"><label class="labelCheck"
                                                                                                      for="politic">Declaro
                                que aceito os <a target="_blank" href="{{route('terms')}}">termos de uso</a> e as
                                <a target="_blank" href="{{route('privacity')}}">políticas de privacidade</a>.</label>
                        </div>
                        <div class="col-12 form-default right-button mt-4">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('js-custom')

    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/gsap@3/dist/Draggable.min.js"></script>
    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>

    <script>
        gsap.registerPlugin(Draggable);

        const getDateFormat = (date) => {
            return date.getFullYear() + '-' + (date.getMonth() + 1).toString().padStart(2, "0") + '-' + date.getDate().toString().padStart(2, "0");
        };

        const daysInYear = (year) => {
            return (year % 4 === 0 && year % 100 > 0) || year % 400 == 0 ? 366 : 365;
        };

        document.querySelectorAll(".useful-datepicker").forEach((datepicker) => {
            const input = $('[name="birthday"]');
            input.on('input', function () {
                updateSystem();
            })

            const today = new Date();

            input.val(getDateFormat(today));

            function updateDate() {
                gsap.set(datepicker.querySelector(".earth"), {
                    rotate: `${this.rotation * 3}deg`,
                });
                const percent = (this.rotation / 360) * 100;
                const days = (percent / 100) * daysInYear(today.getFullYear());
                const newDate = new Date();
                newDate.setDate(today.getDate() + days);
                input.val(getDateFormat(newDate));
            }

            Draggable.create(datepicker.querySelector(".rotate"), {
                type: "rotation",
                inertia: true,
                throwResistance: 0.5,
                onDrag: updateDate,
                onThrowUpdate: updateDate,
            });
        });

        $('#registrar').on('submit', async function (e) {
            e.preventDefault();
            $('#registrar button[type="submit"]').addClass('disabled').html(
                $('<span>').prop({
                    innerHTML: '',
                    className: 'spinner-border spinner-border-sm',
                    style: 'margin: 0 18px;'
                })
            );
            var invaliteInputs = $('.is_invalid');
            invaliteInputs.addClass('is_invalid_back');
            invaliteInputs.removeClass('is_invalid');

            var oldErrors = $('p.error');
            oldErrors.removeClass('error').addClass('back_error');
            setTimeout(function () {
                oldErrors.remove();
            }, 2000);

            await $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('register-send') }}",
                data: $('#registrar').serialize(),
                type: 'post',
                dataType: 'json',
                success: function (result) {
                    if (result.status === 'success') {
                        $('.form-default input').addClass('is_valid');
                        location.reload();
                    }
                    if (result.status === 'error') {
                        result.message.forEach(function (value) {
                            for (var nameError in value) {
                                var input = $('[name="' + nameError + '"]');
                                input.addClass('is_invalid');
                                if (value[nameError] != '') {
                                    input.parents('.form-default').prepend(
                                        $('<p>').prop({
                                            innerHTML: value[nameError],
                                            className: 'error'
                                        })
                                    );
                                }
                            }
                        });
                        $('#registrar button[type="submit"]').removeClass('disabled').html('Enviar');
                    }
                }, error: function (e) {
                    $('#registrar button[type="submit"]').removeClass('disabled').html('Enviar');
                }
            });
        });
    </script>
@endsection

