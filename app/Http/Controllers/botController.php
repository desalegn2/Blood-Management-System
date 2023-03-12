<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class botController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('.*hi.*|.*hello.*|.*ሰላም.*|.*HI.*|.*Hello.*|.*selam.*', function ($bot) {

            $bot->reply('ሀሎ ምን ልርዳወት ?');
            // $this->askName($bot); ደም ለግሽ ምን እጠቀማለው
        });

        $botman->hears('.*ደም መስጠት ጥሩ ነው.*|.*ደም መስጠት ጥሩ.*|.*ደም መስጠት ጥቅም አለው.*|.*ደም መስጠት ጥቅሙ ምንድን ነው.*|.*ደም መስጠት ለማን ይጠቅማል.*|.*ደም መለገስ ለማን ይጠቅማል.*|.*ደም ለግሽ ምን እጠቀማለው.*', function ($bot) {


            $bot->reply('ደም መለገስ ብዙ የጤና ጠቀሜታዎች አሉት። በተጨማሪም የደም ልገሳ በሚሊዮን የሚቆጠሩ ሰዎችን ሕይወት ማዳን ይችላል። 
            በየዓመቱ ወደ 4.5 ሚሊዮን ሰዎች ደም መውሰድ ያስፈልጋቸዋል. በዩናይትድ ስቴትስ ውስጥ በየዓመቱ 21 ሚሊዮን የደም ኮምፖኖች በደም 
            ውስጥ ይሰጣሉ. አንድ ደም ልገሳ እስከ 3 ህይወት ሊታደግ ይችላል። የሰው ደም እና አርጊ ፕሌትሌትስ በሰው ሰራሽ መንገድ ሊሰሩ 
            አይችሉም፣ለዚህም ነው ልገሳ በተለያዩ በሽታዎች የሚሰቃዩትን ለመርዳት በጣም ወሳኝ የሆነው። በየሁለት ሰኮንዱ በዩኤስ ውስጥ ያለ ሰው ደም 
            ያስፈልገዋል። ለወደፊቱ ፍላጎት በሚኖርበት ጊዜ ደምዎን ማከማቸት ይችላሉ. ደም መለገስ ለለጋሽ እና ለተቀባዩ የጤና ጠቀሜታ አለው። ደም 
            መለገስ 8 የጤና በረከቶች እነሆ።');
        });

        $botman->hears('.*ደም.*አይነ.*|.*ደም.*ዓይነት.*|.*ደም (?=ዐይነት).*', function ($bot) {
            $bot->reply(' 4 ዋና ዋና የደም ቡድኖች (የደም ዓይነቶች) አሉ - A, B, AB እና O. የደምዎ አይነት የሚወሰነው
            ከወላጆችዎ በሚወርሱት ጂኖች ነው. እያንዳንዱ ቡድን RhD ፖዘቲቭ ወይም RhD ኔጌቲቭ ሊሆን ይችላል፣ ይህ ማለት በአጠቃላይ 
            8 የደም ቡድኖች አሉ።');
        });

        $botman->hears('.*ደም.*|.*ደም ምንድን.*', function ($bot) {
            $bot->reply(' ደም ለሕይወት አስፈላጊ ነው. ደም በሰውነታችን ውስጥ ይሰራጫል እና እንደ
             ኦክሲጅን እና አልሚ ንጥረ ነገሮችን ወደ የሰውነት ሴሎች ያቀርባል.');
        });
        $botman->hears('.*ደም ለሰው እንዴት ይሰጣል.*|.*ደም ለሰው.*|.*ደም እንዴት ይሰጣል.*', function ($bot) {
            $bot->reply(' ደም ብዙ ጊዜ የሚሰጠው ካንኑላ በተባለ ትንሽ የፕላስቲክ ቱቦ ሲሆን ይህም በክንድዎ ውስጥ ባለው የደም
              ሥር ውስጥ ይገባል. ካንኑላ ከተንጠባጠብ ጋር የተገናኘ እና ደሙ በእንጠባቡ በኩል ወደ ክንድዎ ይገባል. ቧንቧው ለደም መሰጠት ወደ ደም መላሽ ቧንቧ ሲገባ
                     አንዳንድ ምቾት ማጣት ሊኖር ይችላል።');
        });

        $botman->hears('.*ደም ለማን ይሰጣል.*|.*ደም ለማን .*|.*ለማን ይሰጣል.*', function ($bot) {
            $bot->reply(' በመኪና አደጋ ወይም በተፈጥሮ አደጋዎች ከባድ ጉዳት ለደረሰባቸው ታካሚዎች ደም መውሰድ ጥቅም ላይ ይውላል. እንደ ሉኪሚያ ወይም የኩላሊት በሽታ ያሉ
                    የደም ማነስን የሚያመጣ በሽታ ያለባቸው ግለሰቦች ብዙውን ጊዜ ደም ደም ያስፈልጋቸዋል።');
        });

        $botman->hears('.*ደም መለገስ ጉዳት አለው ወይ.*|.*ደም መለገስ ጉዳት.*|.*መለገስ ያለው ጉዳት.*', function ($bot) {
            $bot->reply('ደም ልገሳ ደህንነቱ የተጠበቀ ነው። አዲስ፣ ንፁህ የሚጣሉ መሳሪያዎች ለእያንዳንዱ ለጋሽ ጥቅም ላይ ይውላሉ፣ ስለዚህ ደም በመለገስ በደም ወለድ ኢንፌክሽን
                      የመያዝ ስጋት አይኖርም። አብዛኛዎቹ ጤናማ ጎልማሶች አንድ ፒንት (ግማሽ ሊትር ያህል) ያለ ምንም የጤና ስጋት በደህና መለገስ ይችላሉ። ደም በመለገስ በጥቂት ቀናት ውስጥ 
                      ሰውነትዎ የጠፉትን ፈሳሾች ይተካል።');
        });

        $botman->hears('.*ባህርዳር ደም ባንክ የት ይገኛል.*|.*ባህርዳር ደም ባንክ.*|.*ባህርዳር ደም ባንክ የት.*', function ($bot) {
            $bot->reply('ባህር ዳር ደም ባንክ በአማራ ክልል ርዕሰ መዲና ባህር ዳር ኢትዮጵያ ውስጥ ይገኛል። ባህር ዳር በሰሜን ምዕራብ ኢትዮጵያ 
            ከአዲስ አበባ 565 ኪሎ ሜትር ርቀት ላይ ትገኛለች።');
        });

        $botman->hears('.*ወደ ልገሳ ቀጠሮዬ እንግዶችን ወይም ልጆችን ከእኔ ጋር ማምጣት እችላለሁ?.*|.*ቀጠሮዬ እንግዶችን ወይም ልጆችን ከእኔ ጋር ማምጣት.*|.*ልገሳ ቀጠሮዬ እንግዶችን ወይም ልጆችን ከእኔ.*', function ($bot) {
            $bot->reply('በዚህ ጊዜ፣ ተጨማሪ እንግዶችን ወይም ልጆችን ለጋሾች የልገሳ ቀጠሮአቸውን እንዲያጅቡ እየፈቀድን ነው። በስጦታ ጊዜ
                    እንግዶች በቦታው ላይ ያሉትን ማንኛውንም የደህንነት ፕሮቶኮሎች መከተል ይጠበቅባቸዋል። የእኛ ለጋሾች፣ በጎ ፈቃደኞች እና የሰራተኞቻችን 
                    ደህንነት ከሁሉም በላይ አስፈላጊ ነው። ክትትል የማያስፈልጋቸው እና የማያስተጓጉሉ ልጆች በመጠባበቅ ወይም በመዝናኛ ቦታ ላይ እንዲቀመጡ
                    እንኳን ደህና መጡ። ክትትል የሚፈልጉ ከሆነ ሌላ አዋቂ ሰው መገኘት አለበት።');
        });

        $botman->hears('.*የደም ልገሳ ሂደት እንዴት ይሠራል?.*|.*ደም ልገሳ ሂደት.*|.*ደም ልገሳ ሂደት.*|.*የደም ልገሳ.*', function ($bot) {
            $bot->reply('ደም መለገስ ቀላል ነገር ነው, ነገር ግን በሌሎች ህይወት ላይ ትልቅ ለውጥ ሊያመጣ ይችላል. እርስዎ ከደረሱበት ጊዜ አንስቶ እስከ ወጡበት ጊዜ ድረስ ያለው የልገሳ ሂደት አንድ ሰዓት ያህል ይወስዳል። ልገሳው በራሱ በአማካይ ከ8-10 ደቂቃ ብቻ ነው። በሂደቱ ውስጥ ያሉት ደረጃዎች፡-

                ምዝገባ
    
                 1.የለጋሾች ምዝገባን ያጠናቅቃሉ፣ ይህም እንደ ስምዎ፣ አድራሻዎ፣ ስልክ ቁጥርዎ እና ለጋሽ መለያ ቁጥር (ካላችሁ) ያሉ መረጃዎችን ያካትታል።
                    2. የለጋሽ ካርድ፣ የመንጃ ፍቃድ ወይም ሌላ ሁለት አይነት መታወቂያ እንዲያሳዩ ይጠየቃሉ።
    
                የጤና ታሪክ እና ሚኒ ፊዚካል
    
                   1. ስለ ጤና ታሪክዎ እና ስለተጓዙባቸው ቦታዎች በግል እና በሚስጥር ቃለ መጠይቅ ወቅት አንዳንድ ጥያቄዎችን ይመልሳሉ።
                    2.የእርስዎን የሙቀት መጠን፣ሂሞግሎቢን፣ የደም ግፊት እና የልብ ምት ይፈተሻል።
    
                    ልገሳ
    
                    1. በክንድዎ ላይ ያለውን ቦታ እናጸዳለን እና ለደም መሳብ የሚሆን አዲስ-ያልጸዳ መርፌ እናስገባለን። ይህ እንደ ፈጣን መቆንጠጥ እና በሰከንዶች ውስጥ ያበቃል።
                    2.ቦርሳው በሚሞላበት ጊዜ ለመዝናናት የተወሰነ ጊዜ ይኖርዎታል. (ለአጠቃላይ ደም ልገሳ ከ8-10 ደቂቃ ያህል ነው። ፕሌትሌትስ፣ ቀይ ህዋሶች ወይም ፕላዝማ በአፌሬሲስ እየለገሱ ከሆነ ስብስቡ እስከ 2 ሰአት ሊወስድ ይችላል።)
                    3. በግምት አንድ ሊትር ደም ከተሰበሰበ ልገሳው ተጠናቅቋል እና አንድ ሰራተኛ በክንድዎ ላይ ማሰሪያ ያደርገዋል።
    
                    እረፍት
    
                    1.ሰውነትዎ የፈሳሽ መጠን ትንሽ እንዲቀንስ ለማድረግ ጥቂት ደቂቃዎችን በመዝናኛ ያሳልፋሉ።
                    2.ከ10-15 ደቂቃዎች በኋላ የመዋጮ ቦታውን ለቀው በተለመደው የእለት ተእለት እንቅስቃሴዎ መቀጠል ይችላሉ።
                    3. ህይወቶችን ለማዳን እንደረዳችሁ በማወቅ በስኬት ስሜት ተደሰት።
    
                    የደም ስጦታዎ እስከ ሶስት ሰዎችን ሊረዳ ይችላል. የተለገሱ ቀይ የደም ሴሎች ለዘላለም አይኖሩም. የመደርደሪያ ሕይወት እስከ 42 ቀናት ድረስ አላቸው። ጤናማ ለጋሽ በየ56 ቀኑ ሊለግስ ይችላል።");');
        });

        $botman->hears('.*ደም ከመለገስ በኋላ ምን ማድረግ.*|.*ደም ከለገስኩ በኋላ.*|.*ደም ከሰጠዉ በኋላ .*|.*ደም ከለገስኩ በኋላ.*|.*ደም ከለገስኩ በሗላ.*', function ($bot) {
            $bot->reply('ደም ከሰጡ በኋላ;
                    የሚከተሉትን የጥንቃቄ እርምጃዎች ይውሰዱ።
                    . ተጨማሪ አራት ብርጭቆዎች (እያንዳንዳቸው ስምንት አውንስ) የአልኮል ያልሆኑ ፈሳሾች ይጠጡ።
                    . በሚቀጥሉት አምስት ሰዓታት ውስጥ ማሰሪያዎን ይልበሱ እና ያድርቁ እና ከባድ የአካል ብቃት እንቅስቃሴ ወይም ማንሳት አያድርጉ።
                    . የመርፌው ቦታ ደም መፍሰስ ከጀመረ, ክንድዎን ወደ ላይ ከፍ በማድረግ እና የደም መፍሰሱ እስኪቆም ድረስ በቦታው ላይ ይጫኑ.
                    . ማዞር ወይም ጥንካሬ ሊያጡ ስለሚችሉ እርስዎን ወይም ሌሎችን ለጉዳት የሚያጋልጥ ማንኛውንም ነገር ለማድረግ ካቀዱ ይጠንቀቁ። ለማንኛውም አደገኛ ስራ ወይም የትርፍ ጊዜ ማሳለፊያ፣ የደም ልገሳን ተከትሎ ወደ እነዚህ ተግባራት መመለስን በተመለከተ የሚመለከታቸውን የደህንነት ምክሮችን ይከተሉ።
                    . ጤናማ ምግቦችን ይመገቡ እና በብረት የበለጸጉ ምግቦችን ወደ መደበኛው አመጋገብዎ ያስቡ ወይም የጠፋውን ብረት በደም ልገሳ ለመተካት ከጤና ባለሙያዎ ጋር የብረት ማሟያ መውሰድን ይወያዩ።
                    ጉዳት ከደረሰብዎ በመጀመሪያዎቹ 24 ሰዓታት ውስጥ ለ 10-15 ደቂቃዎች በረዶን ወደ ቦታው ይተግብሩ። ከዚያ በኋላ ለ 10-15 ደቂቃዎች ሞቅ ያለ እርጥበት ያለው ሙቀት ወደ ቦታው ላይ በየጊዜው ይተግብሩ. የቀስተ ደመና ቀለም ለ10 ቀናት ያህል ሊከሰት ይችላል።
                    . መፍዘዝ ወይም ጭንቅላት ካጋጠመህ፡ የምትሰራውን አቁም፣ ተኛ እና ስሜቱ እስኪያልፍ ድረስ እግርህን አንሳ እና በደህና እንቅስቃሴዎችህን ለመቀጠል ጥሩ ስሜት ይሰማሃል።
                    . እና ህይወትን ለማዳን እንደረዳህ በማወቅ ስሜት መደሰትህን አስታውስ!
                    . የሚቀጥለውን ቀጠሮዎን ያቅዱ።');
        });

        $botman->hears('.*የደም ልገሳ ምን ያህል ጊዜ ይወስዳል?.*|.*ደም ልገሳ ምን ያህል ጊዜ .*|.*ደም ለመስጠት ስንት ሰዓት .*|.*ደም ለመለገስ ስንት ሰዓት.*', function ($bot) {
            $bot->reply('አጠቃላይ ሂደቱ አንድ ሰዓት እና 15 ደቂቃ ያህል ይወስዳል; የአንድ ሊትር ሙሉ የደም ክፍል ትክክለኛ ልገሳ 
                     ከስምንት እስከ 10 ደቂቃ ይወስዳል። ይሁን እንጂ ከለጋሹ የጤና ታሪክ እና በደም አንፃፊ ላይ መገኘትን ጨምሮ በተለያዩ ሁኔታዎች ላይ 
                     በመመርኮዝ በእያንዳንዱ ሰው ጊዜ በትንሹ ይለያያል።');
        });

        $botman->hears('.*ደም መስጠት የሚችለው ማን ነው?.*|.*ደም መስጠት የሚችለው.*|.*ደም ለመስጠት ለመስጠት መስፈርቱ.*|.*ደም ለመስጠት አድሜ ይጠይቃል.*', function ($bot) {
            $bot->reply('በአብዛኛዎቹ ግዛቶች፣ ለጋሾች 17 ዓመት ወይም ከዚያ በላይ መሆን አለባቸው። አንዳንድ ግዛቶች የ16 ዓመት ልጆች
                     የተፈረመ የወላጅ ፈቃድ ቅጽ ያላቸው ልገሳ ይፈቅዳሉ። ለጋሾች ቢያንስ 48 ኪሎ ግራም መመዘን እና በጥሩ ጤንነት ላይ መሆን አለባቸው። 
                      ተጨማሪ የብቃት መስፈርቶች ተፈጻሚ ይሆናሉ።');
        });

        $botman->hears('.*ምን ያህል ጊዜ ደም መለገስ እችላለሁ?.*|.*ምን ያህል ጊዜ ደም መለገስ .*|.*ስንት ጊዜ ደም መለገስ .*|.*ደም እምለግሰዉ ስንት.*', function ($bot) {
            $bot->reply('ከሙሉ ደም ልገሳ እና 16 ሳምንታት (112 ቀናት) መካከል በኃይል ቀይ ልገሳ መካከል ቢያንስ ስምንት ሳምንታት
                      (56 ቀናት) መጠበቅ አለቦት። ሙሉ ደም ለጋሾች በዓመት እስከ 6 ጊዜ ሊለግሱ ይችላሉ። ፕሌትሌት አፌሬሲስ ለጋሾች በየ 7 ቀኑ በዓመት 
                      እስከ 24 ጊዜ ሊሰጡ ይችላሉ። ለራሳቸው ደም ለሚሰጡ (ራስ-ሰር ለጋሾች) ደንቦች የተለያዩ ናቸው።');
        });

        $botman->hears('.*ለጋሾች ውጤታቸው መቼ ነው የሚነገረው? እና ለጋሾች ውጤቶችን እንዴት ማግኘት ይችላሉ?.*|.*ውጤታቸው መቼ ነው የሚነገረው.*|.*መቼ ውጤቴን አያለው.*|.*የምርመራ ውጤቴ ይደርሰኛል.*|.*መቸ ወጤቱ.*', function ($bot) {
            $bot->reply('የባህር ዳር ደም ለጋሽ ደንበኞች ዉጤታቸውን ለማየት፣ የባህር ዳር ደም ባንክ ኢንፎርሜሽን ማኔጅመንት ዌብ ሲስተም ተጠቃሚ ከሆኑ  መቸ ወጤቱ
            ዉጤታቸዉ በሲስተሙ ይደርሳቸዋል፣ካልሆኑ ደግሞ ሲለግሱ ባስመዘገቡት ስልክ ቁጥር ዉጤታቸዉን መጥተዉ እንዲያዩ መልዕክት የደርሳቸዋል።ደንበኞች ሲስተሙን ቢጠቀሙ ጥሩ ይሆናል።');
        });

        $botman->fallback(function ($bot) {
            $user_question = $bot->getMessage()->getText();
            $bot->reply("I am sorry, I don't understand ይቅርታ: $user_question ስትል ምን ለማለት እንደፈለግክ እርግጠኛ አይደለሁም ።
            በተሻለ እንድረዳህ እባክህ ተጨማሪ አውድ ማቅረብ ወይም ጥያቄህን ማብራራት ትችላለህ::
                     ጥያቄህ ከደም ባንክ ፣ከደም አሰጣጥ፣አለጋገስ መውጣት የለበትም።");
        });



        // $botman->hears('{message}', function ($botman, $message) {


        //     if ($message == 'hi') {
        //         $this->askName($botman);
        //     }    

        // elseif ($message == 'መቸ መለገስ ይቻላል') {

        //         $botman->reply("");
        //     {

        //         }

        // else {
        //         $botman->reply("I'm sorry, I don't understand your question ....");
        //     }
        // });

        $botman->listen();
    }
    public function askName($botman)
    {
        $botman->ask('Hello! How can I assist you today?', function (Answer $answer) {

            $name = $answer->getText();

            $this->say('Nice to meet you ' . $name);
        });
    }
}