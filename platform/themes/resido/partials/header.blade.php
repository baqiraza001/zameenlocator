<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css2?family={{ urlencode(theme_option('font_heading', 'Jost')) }}:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family={{ urlencode(theme_option('primary_font', 'Muli')) }}:300,400,600,700" rel="stylesheet" type="text/css">
    <!-- CSS Library-->

    <style>
        :root {
            --primary-color: {{ theme_option('primary_color', '#2b4db9') }};
            --font-body: {{ theme_option('primary_font', 'Muli') }}, sans-serif;
            --font-heading: {{ theme_option('font_heading', 'Jost') }}, sans-serif;
        }
    </style>

    <script>
        "use strict";
        window.trans = {
            "Price": "{{ __('Price') }}",
            "Number of rooms": "{{ __('Number of rooms') }}",
            "Number of rest rooms": "{{ __('Number of rest rooms') }}",
            "Square": "{{ __('Square') }}",
            "No property found": "{{ __('No property found') }}",
            "million": "{{ __('million') }}",
            "billion": "{{ __('billion') }}",
            "in": "{{ __('in') }}",
            "Added to wishlist successfully!": "{{ __('Added to wishlist successfully!') }}",
            "Removed from wishlist successfully!": "{{ __('Removed from wishlist successfully!') }}",
            "I care about this property!!!": "{{ __('I care about this property!!!') }}",
            "See More Reviews": "{{ __('See More Reviews') }}",
            "Reviews": "{{ __('Reviews') }}",
            "out of 5.0": "{{ __('out of 5.0') }}",
            "service": "{{ trans('plugins/real-estate::review.service') }}",
            "value": "{{ trans('plugins/real-estate::review.value') }}",
            "location": "{{ trans('plugins/real-estate::review.location') }}",
            "cleanliness": "{{ trans('plugins/real-estate::review.cleanliness') }}",
            "please_enter_address": "{{ __('Please enter address') }}",
            "address_invalid": "{{ __('Address invalid') }}"
        }
        window.themeUrl = '{{ Theme::asset()->url('') }}';
        window.siteUrl = '{{ url('') }}';
        window.currentLanguage = '{{ App::getLocale() }}';
    </script>

    {!! Theme::header() !!}
</head>
<body class="{{ theme_option('skin', 'blue') }}" @if (BaseHelper::siteLanguageDirection() == 'rtl') dir="rtl" @endif>
<div id="alert-container"></div>

@if (theme_option('preloader_enabled', 'no') == 'yes')
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader"><div class="preloader"><span></span><span></span></div></div>
@endif

    
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DXPKKJ" height="0" width="0" style="display:none; visibility:hidden"></iframe>
    </noscript>
    
    
<script type="application/ld+json">
{
"@context" : "http://schema.org",
"@type" : "WebSite",
"name" : "Zameen Locator",
"alternateName" : "Place Finder",
"url" : "https://zameenlocator.com/"
}
</script>    
    
    
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Zameen Locator: Explore Pakistan's Real Estate Maps & Locations",
  "image": "https://zameenlocator.com/assets/zlogo.webp",
  "@id": "",
  "url": "https://zameenlocator.com/",
  "telephone": "03496888886",
  "priceRange": "Free",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Suit 9 First Floor Galaxy Heights inn Model Town B",
    "addressLocality": "Bahawalpur",
    "postalCode": "63100",
    "addressCountry": "PK"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "00:00",
    "closes": "23:59"
  },
  "sameAs": [
    "https://www.twitter.com/zameenlocator",
    "https://www.instagram.com/zameenlocator",
    "https://www.youtube.com/zameenlocator",
    "https://www.linkedin.com/in/zameenlocator",
    "https://www.facebook.com/zlofficial",
    "https://www.pinterest.com/zameenlocator",
    "https://zameenlocator.com/"
  ] 
}
</script>


<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "BreadcrumbList", 
  "itemListElement": [{
    "@type": "ListItem", 
    "position": 1, 
    "name": "Zameen Locator: Explore Pakistan's Real Estate Maps & Locations",
    "item": "https://zameenlocator.com/"  
  },{
    "@type": "ListItem", 
    "position": 2, 
    "name": "Pakistan Area Unit Convertor: Marla to Kanal",
    "item": "https://zameenlocator.com/Front/area_converter"  
  },{
    "@type": "ListItem", 
    "position": 3, 
    "name": "Mortgage Home Loan Calculator",
    "item": "https://zameenlocator.com/Front/mortgage_calculator"  
  },{
    "@type": "ListItem", 
    "position": 4, 
    "name": "Housing Society Maps Free Download",
    "item": "https://zameenlocator.com/Front/download_free_maps"  
  },{
    "@type": "ListItem", 
    "position": 5, 
    "name": "Explore Punjab and Sindh Land Records Online",
    "item": "https://zameenlocator.com/Front/land_record_online"  
  },{
    "@type": "ListItem", 
    "position": 6, 
    "name": "Hajj Umrah Guide: Exploring Makkah And Madinah Maps",
    "item": "https://zameenlocator.com/Front/hajj_umrah_guide"  
  },{
    "@type": "ListItem", 
    "position": 7, 
    "name": "Countries Maps Region Population And History",
    "item": "https://zameenlocator.com/Front/country_map"  
  },{
    "@type": "ListItem", 
    "position": 8, 
    "name": "Pakistan Area Conversion Calculator",
    "item": "https://zameenlocator.com/Front/area"  
  },{
    "@type": "ListItem", 
    "position": 9, 
    "name": "House Construction Cost Calculator",
    "item": "https://zameenlocator.com/Front/construction_cost"  
  },{
    "@type": "ListItem", 
    "position": 10, 
    "name": "Home Renovation Cost Estimator",
    "item": "https://zameenlocator.com/Front/home_renovation"  
  },{
    "@type": "ListItem", 
    "position": 11, 
    "name": "Currency Converter: Real-Time Exchange Rate Calculator",
    "item": "https://zameenlocator.com/Front/currency_converter"  
  },{
    "@type": "ListItem", 
    "position": 12, 
    "name": "Home Loan & Finance Calculator: Calculate Your Mortgage",
    "item": "https://zameenlocator.com/Front/home_loan"  
  },{
    "@type": "ListItem", 
    "position": 13, 
    "name": "Real Estate Agent Commission Calculator",
    "item": "https://zameenlocator.com/Front/agent_commission"  
  },{
    "@type": "ListItem", 
    "position": 14, 
    "name": "Return on Investment (ROI) Calculator",
    "item": "https://zameenlocator.com/Front/roi"  
  },{
    "@type": "ListItem", 
    "position": 15, 
    "name": "Crypto Profit and Loss Calculator",
    "item": "https://zameenlocator.com/Front/crypto"  
  },{
    "@type": "ListItem", 
    "position": 16, 
    "name": "Life Insurance Calculator - Financial Planning",
    "item": "https://zameenlocator.com/Front/life_insurance"  
  },{
    "@type": "ListItem", 
    "position": 17, 
    "name": "Refinance Mortgage Calculator",
    "item": "https://zameenlocator.com/Front/refinance"  
  },{
    "@type": "ListItem", 
    "position": 18, 
    "name": "Home Interior Design Cost Calculator",
    "item": "https://zameenlocator.com/Front/interior_design"  
  },{
    "@type": "ListItem", 
    "position": 19, 
    "name": "Antique Maps: Discover History's Cartographic Treasures",
    "item": "https://zameenlocator.com/Front/antique_map"  
  },{
    "@type": "ListItem", 
    "position": 20, 
    "name": "Zameen Locator Banner's Advertisement Categories",
    "item": "https://zameenlocator.com/Front/banners_advertisement"  
  },{
    "@type": "ListItem", 
    "position": 21, 
    "name": "Car Loan Calculator: Loan Terms And Interest Rate",
    "item": "https://zameenlocator.com/Front/car_loan"  
  },{
    "@type": "ListItem", 
    "position": 22, 
    "name": "The Pakistan National Highway Authority (NHA) Road Map",
    "item": "https://zameenlocator.com/Front/nha_road_map"  
  },{
    "@type": "ListItem", 
    "position": 23, 
    "name": "Contact Us",
    "item": "https://zameenlocator.com/Front/contact"  
  },{
    "@type": "ListItem", 
    "position": 24, 
    "name": "Frequently Asked Questions FAQ'S",
    "item": "https://zameenlocator.com/Front/Faqs"  
  },{
    "@type": "ListItem", 
    "position": 25, 
    "name": "Zameen Locator Blogs Categories",
    "item": "https://zameenlocator.com/blog-categories"  
  },{
    "@type": "ListItem", 
    "position": 26, 
    "name": "Finance Blogs",
    "item": "https://zameenlocator.com/blogs/finance"  
  },{
    "@type": "ListItem", 
    "position": 27, 
    "name": "Business Blogs",
    "item": "https://zameenlocator.com/blogs/-business"  
  },{
    "@type": "ListItem", 
    "position": 28, 
    "name": "Real Estate Blogs",
    "item": "https://zameenlocator.com/blogs/real-estate"  
  },{
    "@type": "ListItem", 
    "position": 29, 
    "name": "Seo Blogs",
    "item": "https://zameenlocator.com/blogs/seo"  
  },{
    "@type": "ListItem", 
    "position": 30, 
    "name": "Technology Blogs",
    "item": "https://zameenlocator.com/blogs/technology"  
  },{
    "@type": "ListItem", 
    "position": 31, 
    "name": "Latest News And Update Blogs",
    "item": "https://zameenlocator.com/blogs/latest-news-and-update"  
  },{
    "@type": "ListItem", 
    "position": 32, 
    "name": "Islam Blogs",
    "item": "https://zameenlocator.com/blogs/islam"  
  },{
    "@type": "ListItem", 
    "position": 33, 
    "name": "Womens Health Blogs",
    "item": "https://zameenlocator.com/blogs/womens-health"  
  },{
    "@type": "ListItem", 
    "position": 34, 
    "name": "Mens Health Blogs",
    "item": "https://zameenlocator.com/blogs/mens-health"  
  },{
    "@type": "ListItem", 
    "position": 35, 
    "name": "Healthcare And Fitness Blogs",
    "item": "https://zameenlocator.com/blogs/healthcare-and-fitness"  
  },{
    "@type": "ListItem", 
    "position": 36, 
    "name": "Politics Blogs",
    "item": "https://zameenlocator.com/blogs/politics"  
  },{
    "@type": "ListItem", 
    "position": 37, 
    "name": "Science And Animal Blogs",
    "item": "https://zameenlocator.com/blogs/-science-and-animal"  
  },{
    "@type": "ListItem", 
    "position": 38, 
    "name": "Marketing Blogs",
    "item": "https://zameenlocator.com/blogs/marketing"  
  },{
    "@type": "ListItem", 
    "position": 39, 
    "name": "Travel Blogs",
    "item": "https://zameenlocator.com/blogs/-travel"  
  }]
}
</script>


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "How property is divided in family law in Pakistan?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "On dissolution of marriage, husband has no right to the property of his wife. Under the Married Women's Property Act, 1874, a married woman has the right to separate property and to taking legal proceedings in her own name. A married woman is also liable for her contracts regarding her property."
    }
  },{
    "@type": "Question",
    "name": "What are the 4 property rights?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Right to possession. Right to control. Right to use and quiet enjoyment. Right to allow others a right to use (licenses and leases)"
    }
  },{
    "@type": "Question",
    "name": "Can a father gives all his property to one child in Pakistan?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "A father is within his rights to give the self-acquired -property to his one son to the exclusion of other children. During his lifetime, his children have no right to claim it. He can pass the same to his one son by gift or by will."
    }
  },{
    "@type": "Question",
    "name": "Who gets property if mother dies?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Married daughter has equal right in the property of her mother as the son, and in case the mother dies intestate, the married daughter inherits her share equally with the son as per the Act of 1956."
    }
  },{
    "@type": "Question",
    "name": "Who is the owner of property after father death?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "After the death of your father, if he died without a Will, then the property will devolve amongst all legal heir. So in case your father did not have a Will, you, your mother and other siblings will be legal heir and the house will devolvé amongst four."
    }
  },{
    "@type": "Question",
    "name": "Is land law and property law the same?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Land law is also known as the law of real property. It relates to the acquisition, protection and conflicts of people's rights, legal and equitable, in land."
    }
  },{
    "@type": "Question",
    "name": "What is the share of daughters on father's property in Pakistan?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Under the rules of succession, the daughters, during the lifetime of their mother, are not entitled to inherit from the estate of their father, and such right accrues to them only after the death of their mother. In other words, the daughters succeed if their mother dies during the lifetime of their father"
    }
  },{
    "@type": "Question",
    "name": "Can a mother give all her property to one son?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "After the probate of the will your mother can proceed to make a will of the same according to her desire. She is at liberty to make the will entirely in favour of one son by ignoring her other children. 3. None of her children has any right to claim a share or equal share in her property"
    }
  },{
    "@type": "Question",
    "name": "How property is transferred after death?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "For proper transfer of property, one needs to apply in the sub-registrar's office. The applicant will need the ownership documents of the property, that is, the Will with a probate or succession certificate. 27-Jun-2022"
    }
  },{
    "@type": "Question",
    "name": "Can a married daughter claim her mother's property?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "The married daughter is the legal heir of her deceased mother, and subsequently, she has the right to claim her share in her mother's property. Her mother's share in the ancestral property shall become her mother's self-acquired property if she had died intestate; her legal heirs are entitled to a share as a right"
    }
  },{
    "@type": "Question",
    "name": "What is the new law of inheritance in Pakistan?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Right of Women to inheritance. - No Women shall be deprived of her share from inheritance in Pakistan.\" Islam has prescribed well-defined shares for the male and female descendants of a deceased person."
    }
  },{
    "@type": "Question",
    "name": "How much do real estate agents make?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "The income of a real estate agent can vary greatly depending on their experience, location, and the current state of the housing market. According to the Bureau of Labor Statistics, the median annual wage for real estate agents in the United States was $51,220 as of May 2020. However, top-performing agents can earn significantly more, with some earning six-figure incomes or more. The income of a real estate agent is typically based on commissions, which are a percentage of the sale price of the property they sell or rent."
    }
  },{
    "@type": "Question",
    "name": "What is real estate?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Real estate refers to property consisting of land and the buildings or other structures on it, along with the natural resources that come with the land, such as water, minerals, and crops. Real estate can also refer to the business of buying, selling, renting, or managing these properties. Real estate includes a wide range of properties, including residential homes, commercial buildings, industrial spaces, farms, and vacant land. Real estate is a valuable asset that can appreciate in value over time, making it an attractive investment opportunity for many people."
    }
  },{
    "@type": "Question",
    "name": "How to start your own business?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "To start your own business, you need to develop a business plan, which outlines your goals, target market, products or services, marketing strategies, and financial projections. You also need to register your business with your state and obtain any necessary licenses or permits. It's important to do thorough research and seek guidance from professionals such as attorneys, accountants, and business coaches to ensure that you are setting your business up for success."
    }
  },{
    "@type": "Question",
    "name": "Master in business administration?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "A Master of Business Administration (MBA) is a graduate degree program that prepares students for careers in business and management. MBA programs typically cover a wide range of business topics, including accounting, finance, marketing, human resources, and operations management. MBA graduates can go on to work in a variety of industries and roles, including consulting, finance, marketing, and management."
    }
  },{
    "@type": "Question",
    "name": "Business Insider?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Business Insider is a popular online news and media outlet that covers business, finance, tech, and other related topics. Business Insider provides a mix of breaking news, analysis, and opinion pieces on a wide range of business-related subjects. The website is known for its in-depth reporting and analysis, as well as its engaging multimedia content."
    }
  },{
    "@type": "Question",
    "name": "How the market works?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "The term \"market\" can refer to a variety of different markets, including the stock market, real estate market, and other financial markets. In general, a market is a place where buyers and sellers come together to exchange goods or services for money. Understanding how the market works involves understanding the supply and demand of the products or services being traded, as well as other factors that can impact prices, such as economic conditions, government policies, and investor sentiment"
    }
  },{
    "@type": "Question",
    "name": "How to invest in the stock market?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Investing in the stock market involves buying shares of publicly-traded companies through a brokerage account. Before investing, it's important to do your research and understand the risks and potential rewards of investing in the stock market. This can involve analyzing company financials, studying market trends, and seeking guidance from financial professionals. It's also important to diversify your portfolio and invest for the long-term rather than trying to time the market."
    }
  },{
    "@type": "Question",
    "name": "How to invest in real estate?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "There are several ways to invest in real estate, including buying rental properties, flipping houses, investing in real estate investment trusts (REITs), or participating in real estate crowdfunding platforms. It's important to do your research and understand the risks and potential rewards of each investment strategy before making any investments."
    }
  },{
    "@type": "Question",
    "name": "How to get into real estate?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "To get into real estate, you can start by taking courses in real estate principles, practices, and laws, which are typically required to obtain a real estate license. You can also gain experience and build your network by working as an assistant or intern for a licensed real estate agent or broker."
    }
  },{
    "@type": "Question",
    "name": "How to become a real estate broker?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "To become a real estate broker, you typically need to meet your state's education and experience requirements, which can include completing additional coursework and obtaining a certain number of years of experience as a licensed real estate agent. You also need to pass a broker licensing exam."
    }
  },{
    "@type": "Question",
    "name": "How to get a real estate license?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "To get a real estate license, you typically need to complete the required pre-licensing education in your state, pass a licensing exam, and meet any other requirements that your state may have. The specific requirements and process may vary depending on where you live."
    }
  },{
    "@type": "Question",
    "name": "How to start a business?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "To start a business, you need to develop a business plan, which outlines your goals, target market, products or services, marketing strategies, and financial projections. You also need to register your business with your state and obtain any necessary licenses or permits. It's important to do thorough research and seek guidance from professionals such as attorneys, accountants, and business coaches to ensure that you are setting your business up for success."
    }
  },{
    "@type": "Question",
    "name": "How to become a real estate agent?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "To become a real estate agent, you need to complete the required education and training in your state, pass a licensing exam, and meet any other requirements that your state may have. This typically involves completing a certain number of hours of pre-licensing coursework"
    }
  },{
    "@type": "Question",
    "name": "What is a copywriter?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "A copywriter is a professional writer who creates content for advertising and marketing purposes, such as advertisements, website copy, and sales letters."
    }
  },{
    "@type": "Question",
    "name": "How to advertise on Google?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "To advertise on Google, you can use Google Ads, which allows you to create and manage ad campaigns that appear on Google search results pages and other Google properties."
    }
  },{
    "@type": "Question",
    "name": "What is native advertising?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Native advertising is a type of advertising that blends in with the content of a website or social media platform, providing a more seamless and less intrusive advertising experience."
    }
  },{
    "@type": "Question",
    "name": "How to advertise your business?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "To advertise your business, you can use various marketing channels, such as social media, email marketing, search engine marketing, and traditional advertising methods such as TV, radio, and print."
    }
  },{
    "@type": "Question",
    "name": "Marketing strategies?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Marketing strategies refer to the specific tactics and techniques used by businesses to promote their products or services, such as advertising, content marketing, and social media marketing."
    }
  },{
    "@type": "Question",
    "name": "Digital marketing?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Digital marketing refers to the use of digital channels, such as social media, email, and search engines, to promote products or services and engage with customers."
    }
  },{
    "@type": "Question",
    "name": "What is market research?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Market research is the process of gathering and analyzing information about a market, including its size, trends, and consumer behavior, to inform business decisions."
    }
  },{
    "@type": "Question",
    "name": "Most Expensive Housing Societies in Pakistan?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "DHA , ParkView City & Bahria Town is Most Expensive Housing Societies in Pakistan."
    }
  },{
    "@type": "Question",
    "name": "Top 5 Housing Societies in Pakistan?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "1 Defence Housing Authority ( DHA ) 2 Park View City Islamabad 3 Bahria Town Lahore 4 New Lahore City 5 Citi Housing Society Kharian\""
    }
  },{
    "@type": "Question",
    "name": "How can I use Zameen Locator maps to search for properties?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Simply enter your desired location and filters to explore available properties with detailed descriptions, photos, and contact information."
    }
  },{
    "@type": "Question",
    "name": "Can Zameen Locator maps help me find nearby schools and amenities?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes, Zameen Locator maps provide information on surrounding schools, hospitals, supermarkets, and other amenities, making it easier to assess the neighborhood."
    }
  },{
    "@type": "Question",
    "name": "Are Zameen Locator maps accessible on mobile devices?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes, Zameen Locator maps are accessible on smartphones and tablets, allowing you to search for properties on the go with a user-friendly interface."
    }
  },{
    "@type": "Question",
    "name": "How accurate is the location information on Zameen Locator maps?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Zameen Locator maps provide accurate property locations, as they are sourced from reliable data and verified by real estate professionals."
    }
  },{
    "@type": "Question",
    "name": "Can I save and compare properties using Zameen Locator maps?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Absolutely! Zameen Locator maps offer features to save properties of interest and compare them side by side, helping you make informed decisions during your property search."
    }
  },{
    "@type": "Question",
    "name": "Is the Zameen Locator satellite views map updated regularly?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes, the Zameen Locator satellite views map is regularly updated to ensure accuracy and provide the most recent satellite imagery available"
    }
  },{
    "@type": "Question",
    "name": "Can I search for specific locations on the Zameen Locator satellite views map?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes, you can search for specific locations by entering the address or name of the place in the search bar provided on the map."
    }
  },{
    "@type": "Question",
    "name": "Are there any additional features on the Zameen Locator satellite views map?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes, apart from satellite views, the Zameen Locator map also offers features like street view, directions, and nearby places for enhanced navigation and exploration."
    }
  },{
    "@type": "Question",
    "name": "Can I share the Zameen Locator satellite views map with others?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes, you can easily share the Zameen Locator satellite views map with others by clicking on the share button and selecting the preferred method of sharing, such as email or social media"
    }
  },{
    "@type": "Question",
    "name": "How can I locate important landmarks during Hajj and Umrah?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Zameen Locator Hajj Umrah Guide and Maps provides detailed maps with marked landmarks, making it easier for pilgrims to navigate and find their way to essential locations during their journey."
    }
  },{
    "@type": "Question",
    "name": "Does Zameen Locator offer real-time updates on crowd congestion during Hajj?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes, Zameen Locator Hajj Umrah Guide and Maps use live data and updates to provide accurate information about crowd density in various areas, helping pilgrims plan their routes and timings accordingly to avoid crowded places."
    }
  },{
    "@type": "Question",
    "name": "Can I use Zameen Locator to find nearby hotels or accommodations?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Absolutely, Zameen Locator Hajj Umrah Guide and Maps include comprehensive information about nearby hotels, providing pilgrims with options that suit their preferences and budgets, ensuring a comfortable stay during their pilgrimage."
    }
  },{
    "@type": "Question",
    "name": "How reliable is Zameen Locator in providing accurate prayer timings?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Zameen Locator Hajj Umrah Guide and Maps utilize official sources and reliable Islamic authorities to ensure accurate prayer timings for various locations, assuring pilgrims can observe their prayers punctually during Hajj and Umrah."
    }
  }]
}
</script>

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->

    <!-- <div class="topbar bg-brand p-2 d-none d-sm-block">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                @if (is_plugin_active('language'))
                    <div class="currency-wrapper">
                        {!! $languages = apply_filters('language_switcher') !!}
                    </div>
                @endif

                @if (is_plugin_active('real-estate'))
                    <div class="topbar-right d-flex align-items-center">
                        <div class="topbar-wishlist">
                            <a class="text-white" href="{{ route('public.wishlist') }}"><i class="fas fa-heart"></i> {{ __('Wishlist') }}(<span class="wishlist-count">0</span>)</a>
                        </div>
                        @php $currencies = get_all_currencies(); @endphp
                        @if (count($currencies) > 1)
                        <div class="ms-3 text-white currency-wrapper">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ get_application_currency()->title }}
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @foreach ($currencies as $currency)
                                        <li>
                                            <a class="dropdown-item"  href="{{ route('public.change-currency', $currency->title) }}" @if (get_application_currency_id() == $currency->id) class="active" @endif><span>{{ $currency->title }}</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->
    <div class="header header-light head-shadow">
        <div class="container">
            <nav id="navigation" class="navigation navigation-landscape">
                <div class="nav-header">
                    @if (theme_option('logo'))
                        <a class="nav-brand" href="{{ route('public.index') }}"><img class="logo" src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="{{ setting('site_title') }}"></a>
                    @endif
                    <div class="nav-toggle"></div>
                </div>
                <div class="nav-menus-wrapper" style="transition-property: none;">
                    {!! Menu::renderMenuLocation('main-menu', [
                        'view'    => 'menu',
                        'options' => ['class' => 'nav-menu'],
                    ]) !!}

                    @if (is_plugin_active('real-estate') && RealEstateHelper::isRegisterEnabled())
                        <ul class="nav-menu">
                            @if (auth('account')->check())
                                <li class="login-item"><a href="{{ route('public.account.dashboard') }}" rel="nofollow"><i class="fas fa-user"></i> <span>{{ auth('account')->user()->name }}</span></a></li>
                                <li class="login-item"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" rel="nofollow"><i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a></li>
                            @else
                                <li class="login-item"><a href="{{ route('public.account.register') }}" rel="nofollow"><i class="fas fa-user"></i> <span>Register</span></a></li>
                                <li class="add-listing">
                                    <a style="padding: 18px 12px;color: white;margin-top: 10px;" href="{{ route('public.account.login') }}" class="btn btn-link bg-success"><img src="{{ Theme::asset()->url('') }}/img/user-light.svg" width="12" alt="" class="mr-2" />{{ __('Sign In') }}</a>
                                </li>
                            @endif
                        </ul>

                        @if (auth('account')->check())
                            <form id="logout-form" action="{{ route('public.account.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endif

                        <div class="clearfix"></div>
                        <div class="d-sm-none mobile-menu">
                            <div class="mobile-menu-item mobile-wishlist">
                                <a href="{{ route('public.wishlist') }}"><i class="fas fa-heart"></i> {{ __('Wishlist') }}(<span class="wishlist-count">0</span>)</a>
                            </div>
                            @if (count($currencies) > 1)
                                <div class="mobile-menu-item currency-wrapper">
                                    <div class="dropdown">
                                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLinkMobile" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ get_application_currency()->title }}
                                            <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLinkMobile">
                                            @foreach ($currencies as $currency)
                                                <li>
                                                    <a class="dropdown-item"  href="{{ route('public.change-currency', $currency->title) }}" @if (get_application_currency_id() == $currency->id) class="active" @endif><span>{{ $currency->title }}</span></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @if (is_plugin_active('language'))
                                <div class="mobile-menu-item currency-wrapper">
                                    {!! $languages = apply_filters('language_switcher') !!}
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </nav>
        </div>
    </div>
    <!-- End Navigation -->
    <div class="clearfix"></div>
