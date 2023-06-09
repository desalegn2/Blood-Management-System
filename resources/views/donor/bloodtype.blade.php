@extends('donor.nav2')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="margin-left: 30px;">
    <div style="margin-top: 60px;">

        <div class="row mt-5 mb-5">
            <div class="col-md-4 ml-5">
                <img class="img-fluid" style="width: 300px; height:400px;" src="{{asset('assets/imgs/bblogo.jpg')}}" alt="...">
            </div>
            <div class="col-md-8">
                <h3 class="card-title mt-2">ደም ህይወት ነው</h3>
                <p class="card-text mb-4">
                    የሰው ሕይወት ከተፀነሰበት ቀን ጀምሮ ደም የሕይወትን የመስጠትና የመንከባከብ ሚናውን ይወጣል። ደም የእድገት ፈሳሽ ነው, ምግብን ከምግብ መፈጨት እና ሆርሞኖችን ከሰውነት ውስጥ እጢ በማጓጓዝ.
                    ደም የጤንነት ፈሳሽ ነው, በሽታን የሚዋጉ ንጥረ ነገሮችን ወደ ቲሹ እና የሰውነት ቆሻሻ ወደ ኩላሊት ማጓጓዝ.

                    ሕያዋን ሴሎች ስላሉት ደም ሕያው ነው። ከተመረቱ መድሃኒቶች በተለየ ደም ሊመረት አይችልም. ጤናማ ለጋሾች ደም ለሚያስፈልጋቸው ሰዎች ብቸኛው የደም ምንጭ ናቸው.

                    ለደም ለጋሾች ባይሆን ኖሮ ለሕይወት አስጊ የሆነ የደም ማነስ ችግር ላለባቸው ሕጻናት ሕይወት አድን ሕክምና፣ የአካል ጉዳት ሰለባዎች፣ ከእርግዝና ጋር የተያያዙ ችግሮች ላጋጠማቸው ሴቶች፣ የአካል ክፍሎች ንቅለ
                    ተከላ፣ መቅኒ ንቅለ ተከላ፣ ውስብስብ የቀዶ ሕክምና ሂደቶች እና የካንሰር ሕክምናዎች አይቻሉም ነበር።

                </p>


                <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fparse.com" target="_blank" rel="noopener">
                    <img class="YOUR_FB_CSS_STYLING_CLASS" src="{{asset('assets/imgs/fb2.png')}}" width="30px" height="30px" alt="Share on Facebook">
                </a>
            </div>
            <div class="card-footer">
                <small class="text-muted"></small>
                <a href="" style="float: right;"></a>
            </div>
        </div>
    </div>
    <div class=" mt-5">
        <div class="row mt-5 mb-5">
            <div class="col-md-4 ml-5">
                <img class="img-fluid" src="{{asset('assets/imgs/bblogo.jpg')}}" alt="...">
            </div>
            <div class="col-md-8">
                <h3 class="card-title mt-2">የደምዎ አይነት ምንድን ነው
                </h3>
                <p class="card-text mb-4">
                    በሰው ደም ውስጥ ያለው ልዩነት አንቲጂኖች እና ፀረ እንግዳ አካላት የሚባሉት አንዳንድ የፕሮቲን ሞለኪውሎች መገኘት ወይም አለመገኘት ነው. አንቲጂኖች በቀይ የደም ሴሎች ገጽ ላይ ይገኛሉ
                    እና ፀረ እንግዳ አካላት በደም ፕላዝማ ውስጥ ይገኛሉ. ግለሰቦች የእነዚህ ሞለኪውሎች ዓይነቶች እና ጥምረት አላቸው.

                    ያለህበት የደም ቡድን ከወላጆችህ በወረስከው ላይ የተመካ ነው።

                    እስካሁን ድረስ ከ20 በላይ በዘረመል የተወሰነ የደም ቡድን ስርዓቶች አሉ ነገርግን የ AB0 እና Rh የደም ቡድን ስርዓቶች ለደም መሰጠት በጣም አስፈላጊዎቹ ናቸው።

                    ሁሉም የደም ቡድኖች እርስ በርስ የሚጣጣሙ አይደሉም. ተኳሃኝ ያልሆኑ የደም ቡድኖችን ማደባለቅ ለግለሰቦች አደገኛ ወደሆነው ደም መጨናነቅ ወይም አጉሊቲኔሽን ይመራል።

                    ሕያዋን ሴሎች ስላሉት ደም ሕያው ነው። ከተመረቱ መድሃኒቶች በተለየ ደም ሊመረት አይችልም. ጤናማ ለጋሾች ደም ለሚያስፈልጋቸው ሰዎች ብቸኛው የደም ምንጭ ናቸው.

                    ለደም ለጋሾች ባይሆን ኖሮ ለሕይወት አስጊ የሆነ የደም ማነስ ችግር ላለባቸው ሕጻናት ሕይወት አድን ሕክምና፣ የአካል ጉዳት ሰለባዎች፣ ከእርግዝና ጋር የተያያዙ ችግሮች ላጋጠማቸው ሴቶች፣
                    የአካል ክፍሎች ንቅለ ተከላ፣ መቅኒ ንቅለ ተከላ፣ ውስብስብ የቀዶ ሕክምና ሂደቶች እና የካንሰር ሕክምናዎች አይቻሉም ነበር።
                    ሁሉም ለጋሾች ከአራቱ የደም ቡድኖች የአንዱ አባል ናቸው፡ A፣ B፣ AB ወይም O. እርስዎም እንደ Rh positive ወይም Rh negative ተመድበዋል። ስለዚህ ስምንት የተለያዩ ዋና ዋና
                    የደም ቡድኖች አሉ.

                    ሁሉም የደም ቡድኖች እርስ በርሳቸው የሚጣጣሙ አይደሉም እና የዘመናዊ ደም ሰጪ መድሃኒቶች ስኬት ለጋሾች እና ታካሚዎች በትክክል በመመደብ እና በማዛመድ ላይ የተመሰረተ ነው.

                    የቡድን O ደም ለማንኛውም የደም ቡድን ታካሚዎች ሊሰጥ ስለሚችል ሁለንተናዊ የደም ዓይነት በመባል ይታወቃል.

                    ያለህበት የደም ቡድን ከወላጆችህ በወረስከው ላይ የተመካ ነው።

                    እስካሁን ድረስ ከ20 በላይ በዘረመል የተወሰነ የደም ቡድን ስርዓቶች አሉ ነገርግን የ AB0 እና Rh የደም ቡድን ስርዓቶች ለደም መሰጠት በጣም አስፈላጊዎቹ ናቸው።

                    ሁሉም የደም ቡድኖች እርስ በርስ የሚጣጣሙ አይደሉም. ተኳሃኝ ያልሆኑ የደም ቡድኖችን ማደባለቅ ለግለሰቦች አደገኛ ወደሆነው ደም መጨናነቅ ወይም አጉሊቲኔሽን ይመራል።

                    ሕያዋን ሴሎች ስላሉት ደም ሕያው ነው። ከተመረቱ መድሃኒቶች በተለየ ደም ሊመረት አይችልም. ጤናማ ለጋሾች ደም ለሚያስፈልጋቸው ሰዎች ብቸኛው የደም ምንጭ ናቸው.

                    ለደም ለጋሾች ባይሆን ኖሮ ለሕይወት አስጊ የሆነ የደም ማነስ ችግር ላለባቸው ሕጻናት ሕይወት አድን ሕክምና፣ የአካል
                    ጉዳት  ሰለባዎች፣ ከእርግዝና ጋር የተያያዙ ችግሮች ላጋጠማቸው ሴቶች፣ የአካል ክፍሎች ንቅለ ተከላ፣ መቅኒ ንቅለ ተከላ፣ ውስብስብ የቀዶ ሕክምና ሂደቶች እና የካንሰር ሕክምናዎች አይቻሉም ነበር።
ሰለባዎች፣ ከእርግዝና ጋር የተያያዙ ችግሮች ላጋጠማቸው ሴቶች፣ የአካል ክፍሎች ንቅለ ተከላ፣ መቅኒ ንቅለ ተከላ፣ ውስብስብ የቀዶ ሕክምና ሂደቶች እና የካንሰር ሕክምናዎች አይቻሉም ነበር።

                </p>


                <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fparse.com" target="_blank" rel="noopener">
                    <img class="YOUR_FB_CSS_STYLING_CLASS" src="{{asset('assets/imgs/fb2.png')}}" width="30px" height="30px" alt="Share on Facebook">
                </a>
            </div>
            <div class="card-footer">
                <small class="text-muted"></small>
                <a href="" style="float: right;"></a>
            </div>
        </div>
    </div>
    <div class=" mt-5">
        <div class="row mt-5 mb-5">
            <div class="col-md-4 ml-5">
                <img class="img-fluid" src="{{asset('assets/imgs/bblogo.jpg')}}" alt="...">
            </div>
            <div class="col-md-8">
                <h3 class="card-title mt-2">የRh ሁኔታ</h3>
                <p class="card-text mb-4">
                    ብዙ ሰዎች በቀይ የደም ሴል ወለል ላይ Rh factor የሚባል ነገር አላቸው። ይህ አንቲጅንም ሲሆን ያላቸው ደግሞ Rh+ ይባላሉ። ያላደረጉት Rh- ይባላሉ.

                    Rh- ደም ያለበት ሰው በደም ፕላዝማ ውስጥ በተፈጥሮ Rh ፀረ እንግዳ አካላት የሉትም (ለምሳሌ A ወይም B ፀረ እንግዳ አካላት ሊኖሩት ስለሚችል)። ነገር ግን አር ኤች ደም ያለበት ሰው አር
                    ኤች ደም ካለበት ሰው ደም ከተቀበለ በደም ፕላዝማ ውስጥ አር ኤች ፀረ እንግዳ አካላት እንዲፈጠር ሊያደርግ ይችላል። Rh+ ደም ያለው ሰው ያለ ምንም ችግር Rh- ደም ካለበት ሰው ደም መውሰድ
                    ይችላል።

                    የኖቤል ተሸላሚ ካርል ላንድስቲነር በሁለቱም የ AB0 እና Rh የደም ቡድኖች ግኝት ውስጥ ተሳትፏል።

                    ሁሉም የደም ቡድኖች እርስ በርሳቸው የሚጣጣሙ አይደሉም እና የዘመናዊ ደም ሰጪ መድሃኒቶች ስኬት ለጋሾች እና ታካሚዎች በትክክል በመመደብ እና በማዛመድ ላይ የተመሰረተ ነው.

                    የቡድን O ደም ለማንኛውም የደም ቡድን ታካሚዎች ሊሰጥ ስለሚችል ሁለንተናዊ የደም ዓይነት በመባል ይታወቃል.

                    ያለህበት የደም ቡድን ከወላጆችህ በወረስከው ላይ የተመካ ነው።

                    እስካሁን ድረስ ከ20 በላይ በዘረመል የተወሰነ የደም ቡድን ስርዓቶች አሉ ነገርግን የ AB0 እና Rh የደም ቡድን ስርዓቶች ለደም መሰጠት በጣም አስፈላጊዎቹ ናቸው።

                    ሁሉም የደም ቡድኖች እርስ በርስ የሚጣጣሙ አይደሉም. ተኳሃኝ ያልሆኑ የደም ቡድኖችን ማደባለቅ ለግለሰቦች አደገኛ ወደሆነው ደም መጨናነቅ ወይም አጉሊቲኔሽን ይመራል።

                    ሕያዋን ሴሎች ስላሉት ደም ሕያው ነው። ከተመረቱ መድሃኒቶች በተለየ ደም ሊመረት አይችልም. ጤናማ ለጋሾች ደም ለሚያስፈልጋቸው ሰዎች ብቸኛው የደም ምንጭ ናቸው.

                    ለደም ለጋሾች ባይሆን ኖሮ ለሕይወት አስጊ የሆነ የደም ማነስ ችግር ላለባቸው ሕጻናት ሕይወት አድን ሕክምና፣ የአካል ጉዳት ሰለባዎች፣ ከእርግዝና ጋር የተያያዙ ችግሮች ላጋጠማቸው ሴቶች፣
                    የአካል ክፍሎች ንቅለ ተከላ፣ መቅኒ ንቅለ ተከላ፣ ውስብስብ የቀዶ ሕክምና ሂደቶች እና የካንሰር ሕክምናዎች አይቻሉም ነበር።

                </p>


                <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fparse.com" target="_blank" rel="noopener">
                    <img class="YOUR_FB_CSS_STYLING_CLASS" src="{{asset('assets/imgs/fb2.png')}}" width="30px" height="30px" alt="Share on Facebook">
                </a>
            </div>
            <div class="card-footer">
                <small class="text-muted"></small>
                <a href="" style="float: right;"></a>
            </div>
        </div>
    </div>
</body>

</html>
@endsection