

        <div class="bg-light py-2 px-4 mb-3" style="text-align: right;">
            <h3 class="m-0">
                <h2>{{ __('lang.Chairman')  . " : " .  __('lang.Owner')}}</h2>
                <h2>{{ __('lang.Editor-in-chief') . " : " .  __('lang.Editor')}}</h2>
            </h3>
        </div>
        <div class="row">
                    <div class="col-md-8" style="text-align: right; font-size: 20px">

                        <p>
                        "arrogantm" صحيفة إخبارية إلكترونية يومية شاملة، تصدر عن الشركة "المصرية للصحافة والنشر والإعلان"،
                            وهى الشركة الناشرة لصحيفة "arrogantm" المطبوعة التى تصدر يومياً،
                            وكانت تصدر أسبوعياً منذ أكتوبر 2008، وصدرت يومياً ابتداء من 31 مايو 2011،
                        </p>

                        <p>
                        وتعمل "arrogantm" على موقعها اليومى وفى صحيفتها اليومية،
                        وفق القواعد المهنية الأصيلة لمهنة الصحافة، والتى تعطى الأولوية فى صناعة الصحافة لإنتاج
                        الأخبار والمعلومات بمصداقية مطلقة، وعمق فى التحليل، وشفافية فى المعلومات</p>
                        <p>

                        وتضع "arrogantm" هذه الأولوية
                        جسرا أساسيا للوصول إلى قرائها، وذلك بلا انتماءات سياسية أو حزبية أو انحيازات
                        عقائدية أو مذهبية أو طائفية مسبقة. وتستند "arrogantm" في الفكر و الرؤية
                        على إيمان عميق وصارم بأسس الدولة المدنية التي تجعل من القانون المرجعية الأولى،
                        وتتزن حركتها بالفصل التام بين السلطات ، وتعتمد نهج الديمقراطية في السياسة،
                        والحرية في الاقتصاد بمسئولية وطنية كأساس للتطور و النهضة والاستقرار الاجتماعي</p>

                        <p>
                            وتتوجه "arrogantm" إلى شريحة القراء من النخبة المصرية
                            التي لا تقتصر على الصفوة فى المحيطين السياسي و المالي، وإنما تمتد إلى الفئات المتعلمة
                            الموزعة على الشرائح المختلفة للطبقة الوسطى المصرية، كما تتوجه إلي شريحة مستهلكي
                            المعلومات والأخبار الموزعة على كل شرائح المجتمع، وتمتد أيضا إلى الباحثين عن
                            الإمتاع في الصحافة المقروءة بموادها المعلوماتية والترفيهية المصورة.
                        </p>

                    </div>


            <div class="col-md-4" style="text-align: right;">
                <div class="bg-light mb-3" style="padding: 30px;">
                        <h6 class="font-weight-bold">{{ __('Lang.Get in touch') }}</h6>
                        <p>{{ __('Lang.Get in touch content') }}</p>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h6 class="font-weight-bold">{{ __('Lang.Our office') }}</h6>
                                <p class="m-0">{{ $contactData->our_office }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa fa-2x fa-envelope-open text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h6 class="font-weight-bold">{{ __('Lang.Email us') }}</h6>
                                <p class="m-0">{{ $contactData->our_email }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-2x fa-phone-alt text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h6 class="font-weight-bold">{{ __('Lang.Call us') }}</h6>
                                <p class="m-0">{{ $contactData->our_phone }}</p>
                            </div>
                        </div>
                    </div>
            </div>

</div>
