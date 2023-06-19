
        <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">
                <h2>{{ __('lang.Chairman')  . " : " .  __('lang.Owner')}}</h2>
                <h2>{{ __('lang.Editor-in-chief') . " : " .  __('lang.Editor')}}</h2>
            </h3>
        </div>
        <div class="row">

                    <div class="col-md-8" style="font-size: 20px">

                        <p>
                        "arrogantm" a comprehensive electronic news newspaper, published by the company "Egyptian Press, Publishing and Advertising",
                        It is the publishing company of the daily publication "arrogantm",
                        It has been issued weekly since October 2008 and has been issued daily since May 31, 2011,
                        </p>

                        <p>"arrogantm" works on its daily site and in its daily newspaper,
                        According to the original professional rules of the journalism profession,
                        priority is given in the press industry to produce
                        News and information with absolute credibility, depth of analysis, transparency of information
                        </p>

                        <p>
                        "arrogantm" places this priority
                        An essential bridge to reach its readers, without political or party affiliations or biases
                        doctrinal, doctrinal or pre-sectarian. arrogantm is based on thought and vision
                        Deeply and rigorously believing in the foundations of the civil State that make the first reference law,
                        Its movement is balanced by the complete separation of powers and adopts a democratic approach to politics,
                        Freedom in the economy is a national responsibility as a basis for development, renaissance and social stability
                        </p>

                        <p>
                        "arrogantm" is headed to the readership segment of the Egyptian elite
                        Not only are elites in the political and financial spheres, they extend to educated groups
                        Distributed to different segments of the Egyptian middle class, and headed to a consumer segment
                        Information and news distributed across all segments of society, also extends to searchers
                        Enjoyment in the readable press of their graphic informational and entertainment materials.
                        </p>

                    </div>


            <div class="col-md-4">
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
