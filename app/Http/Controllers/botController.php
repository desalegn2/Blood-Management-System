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
        ////////////////////////////////////
        $botman->hears('.*blood.*|.*blood.*is.*|.*list.*blood content.*', function ($bot) {
            $bot->reply('Blood is a fluid connective tissue that circulates throughout the body of animals,
            including humans.
             It plays a vital role in transporting oxygen and nutrients to cells and
              removing waste products and carbon dioxide from them. Blood is composed of plasma, 
           a liquid portion that contains various proteins, nutrients,
            hormones, and waste products, as well as cellular components such as red blood cells,
             white blood cells, and platelets.');
        });
        $botman->hears('.*who can .*donate.*|.*is human.*have disease.*can.*donate.*|.*can.*donate.*', function ($bot) {
            $bot->reply('Generally, anyone who meets the eligibility criteria set by blood donation organizations can donate blood. 
                     general, donors must:
                     Be in good health and feeling well on the day of donation
                     Be at least 17 years old.
                     Meet the minimum weight requirement (usually around 110 pounds or 50 kilograms).
                     Have a hemoglobin level within the acceptable range
                     Have a normal blood pressure and pulse rate
                     Not have any infectious diseases or conditions that could be transmitted through blood donation.
                     Not have engaged in high-risk behaviors that could increase their risk of contracting blood-borne infections,
                     such as HIV or hepatitis B or C
                     It is always best to check with your local blood donation organization for their specific eligibility requirements.');
        });
        $botman->hears('.*what is.*blood type.*|.*blood type.*is.*|.*list.*blood type.*|.*what are.*blood type.*|.*type of blood.*|.*blood type are.*|.*blood type.*', function ($bot) {
            $bot->reply('A blood type is a classification system that allows healthcare 
                 providers to determine whether your blood is compatible or 
                 incompatible with someone else’s blood. There are four main blood types:
                 A, B, AB and O. Blood bank specialists determine your blood type based on
                 whether you have antigen A or B on your red blood cells. 
                 They also look for a protein called the Rh factor. They classify your blood 
                type as positive (+) if you have this protein and negative (-) if you don’t.');
        });
        $botman->hears('.*A+.*', function ($bot) {
            $bot->reply('A+ blood type is a blood type that is characterized by the presence of
                      both the A antigen and the Rh factor protein on the surface of red blood cells.
                       This means that people with A+ blood type have antibodies against the B antigen 
                       and can receive blood from A+ or O+ donors, but not from B+ or AB+ donors.
                       In terms of compatibility for blood transfusions, A+ blood can be safely given to 
                       people with A+ or AB+ blood type. A+ individuals can receive blood from A+ or A- donors,
                       as well as from O+ donors, but they cannot receive blood from individuals with B+ or AB+ 
                       blood type.
                       It is important to note that blood type is just one factor that determines blood compatibility,
                       and there are many other factors that need to be taken into consideration when a blood transfusion
                 is needed.');
        });
        $botman->hears('.*A-.*', function ($bot) {
            $bot->reply('A- blood type is a blood type that is characterized by the absence of the Rh factor protein on the surface
                          of red blood cells,
                         and the presence of the A antigen. This means that people with A- blood type 
                         have antibodies against the Rh factor, which can cause problems if they receive Rh-positive blood.
                         In terms of compatibility for blood transfusions, A- blood can be safely given to people with
                         A- or AB- blood type. A- individuals can receive blood from A- or O- donors. However, they 
                         cannot receive blood from individuals with Rh-positive blood types, such as A+ or B+.
                         It is important to note that blood type is just one factor that determines blood compatibility,
                         and there are many other factors that need to be taken into consideration when a blood transfusion 
                         is needed');
        });

        $botman->hears('.*how much .*blood can i donate.*|.*which amount .*can every one .*donate.*|.*volume.*we donate.*|.*what.*volume.*can i.*donate.*|.*volume.*donation.*|.*blood.*volume .*donate.*', function ($bot) {
            $bot->reply('The volume of blood that a person can donate depends on various factors 
                    such as their age, weight, and overall health. In most cases, a single blood donation 
                    typically ranges from 350 to 500 milliliters (ml) of blood. This is equivalent to about
                     one pint of blood.

                     However, it is important to note that donation centers may have their own policies and 
                     guidelines regarding the amount of blood that can be donated in a single session.');
        });

        $botman->hears('.*when .* donate.*|.*what .*time .*donate.*|.*which.*time.* donate.*|.*after.*time.*can i.*donate.*|.*when.*donation.*|.*gap.* .*donation.*', function ($bot) {
            $bot->reply('gap for blood donation
                       The recommended gap between blood donations varies depending on the guidelines
                       of the blood donation center and the country in which you live. 
                       In general, most countries recommend a minimum gap of 8 weeks
                       (56 days) but our blood bank guidelinesis 90 day  between whole blood donations. This is to ensure
                       that the body has enough time to replenish the lost blood 
                       cells and to allow for complete recovery before donating blood again.');
        });

        $botman->hears('.*B-.*', function ($bot) {
            $bot->reply('Blood type B- is a specific type of blood that is 
                      determined by the presence of certain antigens on the surface of
                      red blood cells. Individuals with blood type B- have
                      B antigens on their red blood cells but do not have the Rh factor antigen 
                      on their red blood cells.
                      This means that they can receive blood from individuals with B- or
                      O- blood types, but they can only donate blood to other individuals
                      with B- or AB- blood types. It is important to know ones blood 
                      type in case of a medical emergency or blood transfusion');
        });

        // $botman->hears('.*B+.*', function ($bot) {
        //     $bot->reply('B+ is a blood type characterized by the presence of the B
        //                  antigen on the surface of red blood cells,
        //                  as well as the presence of the Rh factor (also known as the D antigen).
        //                  People with B+ blood can receive blood transfusions from donors with B+ 
        //                  or O+ blood types. They can donate blood to people with B+ and AB+ blood types.');
        // });

        $botman->hears('.*AB+.*', function ($bot) {
            $bot->reply('Blood type AB+ is one of the blood types in the ABO blood group system. 
                         It is a relatively rare blood type, found in approximately 3-5% of the population.
                         Here is a breakdown of what the blood type AB+ represents:
                          ABO Blood Group:
                          Blood type AB is determined by the presence of both A and B antigens on the surface of red blood cells.
                          Rh Factor:
                          The "+" symbol indicates the presence of the Rh (Rhesus) antigen on the red blood cells. 
                          Individuals with the Rh antigen are Rh-positive, while those without it are Rh-negative.');
        });
        $botman->hears('.*AB-.*', function ($bot) {
            $bot->reply('Blood type AB- is a blood type that belongs to the ABO blood group system and has the Rh (Rhesus)
                          factor negative.
                           Here is a breakdown of what the blood type AB- represents:
                          ABO Blood Group:
                          Blood type AB is determined by the presence of both A and B antigens on the surface of red blood cells.
                          Rh Factor:
                          The "-" symbol indicates the absence of the Rh antigen on the red blood cells. Individuals without the Rh antigen are Rh-negative, 
                          while those with it are Rh-positive.
                          Therefore, individuals with blood type AB- have both A and B antigens on their red blood cells but do not have the Rh antigen.');
        });
        // $botman->hears('.*O+.*|.*oplus.*', function ($bot) {
        //     $bot->reply('O+ is a blood type characterized by the presence of the O
        //                  antigen on the surface of red blood cells,
        //                  as well as the presence of the Rh factor (also known as the D antigen).
        //                  People with B+ blood can receive blood transfusions from donors with B+ 
        //                  or O+ blood types. They can donate blood to people with B+ and AB+ blood types.');
        // });
        $botman->hears('.*O-.*', function ($bot) {
            $bot->reply('Blood type O- refers to a specific blood type that lacks both A and B antigens on the surface of 
                       red blood cells and also lacks the Rh factor. This makes it a universal donor, as it can be 
                       transfused to people with any blood type without causing an adverse reaction. However, people 
                       with O- blood can only receive O- blood in a transfusion. O- is relatively rare, with only about
                       6% of the global population having this blood type');
        });
        $botman->hears('.*what is.*aim of system.*|.*why register.*|.*what is.*function.*of system.*|.*function.*of system.*|.*main function.*of system.*|.*advantage .*of system.* ', function ($bot) {
            $bot->reply('The aim of a blood bank management system is to efficiently manage the collection, processing, 
                       testing, storage, and distribution of blood and blood products. This system ensures that the right
                       blood type and quantity are available at the right time for patients who need transfusions due to
                       medical emergencies, surgeries, or chronic illnesses');
        });

        $botman->hears('.*how the.*system work.*|.*how donor.*register.*|.*donor.*register.* ', function ($bot) {
            $bot->reply('
                       A blood bank management system typically works in the following way:
        
                        Donor Registration: The system allows individuals to register as donors and provides a platform for them to schedule appointments for blood donation.
        
                        Donor Screening: The system screens the donors for eligibility based on their medical history, age, weight, and other criteria.
        
                        Blood Collection: Once the donor is deemed eligible, the system facilitates the collection of blood from the donor and records the details of the donation.
        
                         Blood Testing: The system performs various tests on the collected blood to ensure that it is safe and suitable for transfusion.
        
                        Inventory Management: The system maintains an inventory of the available blood and blood products, including their type, quantity, and expiry dates.
        
                        Blood Grouping and Cross-matching: The system ensures that the correct blood type is provided to the patient by performing blood grouping and cross-matching tests.
        
                        Labeling and Tracking: The system labels the blood products with unique identification numbers and tracks their movement within the blood bank.
        
                        Issuing of Blood Products: The system issues the appropriate blood products to hospitals and clinics as per their requirements.
        
                         Record Keeping: The system maintains accurate records of donor information, blood collection, testing, inventory, and issuing of blood products.
        
                        Reporting and Analysis: The system generates reports and analyzes data to monitor the safety and quality of blood and blood products, identify trends, and improve processes.
        
                         Overall, the blood bank management system streamlines the entire blood banking process, from donor registration to blood issuance, while ensuring safety, efficiency, and compliance with regulatory requirements.');
        });
        $botman->hears('.*why register.*donor.*|.*why.*donor.*|.*purpose .*donor.* ', function ($bot) {
            $bot->reply('In a blood bank management system, registering donors is an essential part of maintaining a sufficient and safe blood supply.');
        });

        $botman->hears('.*how donate.*blood.*|.*how .*donor.*donate.*|.* ', function ($bot) {
            $bot->reply('you can register to the system and send reservation after that nurse send conformation and date of donation . based on that schedul you can donate');
        });

        $botman->hears('.*how stor.*blood.*|.*how .*blood.*store.*|.* ', function ($bot) {
            $bot->reply('Storing blood is an important part of the blood banking process, and it involves several steps to ensure the safety and quality of the blood product. Here is a general overview of how blood is stored:
            ');
        });
        $botman->hears('.*what.*tempreture.*stored.*|.*tempreture .*blood.*store.*|.*blood .*tempreture.*', function ($bot) {
            $bot->reply('Red blood cells: Red blood cells are typically stored at a temperature between 1-6°C (34-43°F) for up to 42 days. This temperature range helps to preserve the viability of the red blood cells and prevent bacterial growth.
        
                         Plasma: Fresh frozen plasma (FFP) is stored at a temperature of -18°C (0°F) or lower for up to one year. Thawed plasma can be stored at a temperature between 1-6°C (34-43°F) for up to 5 days.
            
                         Platelets: Platelets are typically stored at a temperature between 20-24°C (68-75°F) with continuous gentle agitation for up to 5 days. This temperature range helps to prevent bacterial growth and maintain the viability of the platelets.');
        });
        $botman->hears('.*when.*blood.*expired.*|.*expired .*date.*|.*when .*expired.*|.*blood.*expired.*', function ($bot) {
            $bot->reply('Blood products have a limited shelf life, and they must be used or discarded before they
                         expire to ensure patient safety. Red blood cells: Red blood cells have an expiration date of 42 days from the date of collection. After 42 days, the red blood cells are no longer viable for transfusion and must be discarded');
        });

        /*health institute*/
        $botman->hears('.*how.*ask.*blood.*|.*ask .*blood.*|.*can.*ask.*blood.*', function ($bot) {
            $bot->reply('they can ask by click link request blood on system ');
        });
        $botman->hears('Can I donate blood if I have recently traveled outside the country?|.*Can I donate .*recently traveled outside the country.*', function ($bot) {
            $bot->reply('The eligibility to donate blood after traveling outside the country 
                         depends on various factors such as the destination visited and the 
                         specific requirements of the blood bank or donation center. In some 
                         cases, there may be deferral periods that apply to certain countries
                         or regions due to concerns about infectious diseases that could be 
                         transmitted through the blood. It is best to check with the blood 
                         donation center or blood bank for their specific guidelines regarding recent travel. ');
        });
        $botman->hears('How often can I donate blood?|.*How often .*donate blood.*', function ($bot) {
            $bot->reply('The frequency at which you can donate blood depends on your 
                         location and the guidelines set by the blood donation organization
                         or blood bank. In many countries, individuals can typically donate
                         whole blood every  12 weeks. This allows sufficient time for 
                         the body to replenish the lost blood components. However, the specific
                         interval may vary, and it is advisable to consult the local blood
                         donation center for their recommended donation frequency. ');
        });
        $botman->hears('What are the general requirements for blood donation?|.*requirements for blood donation .*', function ($bot) {
            $bot->reply('The general requirements for blood donation may include:
                         Being in good overall health.
                         Meeting the minimum age requirement (usually 17 or 18 years old).
                         Weighing above a certain minimum weight (typically around 110 pounds or 50 kilograms).
                         Having a normal body temperature and blood pressure within acceptable limits.
                         Having a hemoglobin level above a specified threshold.
                        Not having any infectious diseases transmissible through blood.
                        Not engaging in high-risk behaviors that could pose a risk to the donated blood.
                        These requirements ensure the safety of both the donor and the recipient of the blood. ');
        });
        $botman->hears('Is there an age limit for blood donation?|.* age limit .*blood donation.*|.*age.*donate.*', function ($bot) {
            $bot->reply('There is typically a minimum age requirement for blood donation,
                          which is often around 18 years old. The maximum age limit
                          varies by country and organization but is generally between 60
                          and 65 years old. However, some blood donation centers may have
                          additional age-related criteria, and it is recommended to consult
                          the specific guidelines of the blood donation center you intend to visit. ');
        });

        //////////////////////////////////

        $botman->hears('.*ደም መስጠት.* ጥሩ.*|.*ደም መስጠት.*ጥቅም.*|.*ደም መስጠት.*ጥቅሙ.*|.*ደም መስጠት.*ይጠቅማል.*|.*ደም መለገስ.*ይጠቅማል.*|.*ደም ለግሽ.*እጠቀማለው.*', function ($bot) {
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

        $botman->hears('.*ደም.*|.*ደም.*ምንድን.*', function ($bot) {
            $bot->reply(' ደም ለሕይወት አስፈላጊ ነው. ደም በሰውነታችን ውስጥ ይሰራጫል እና እንደ
             ኦክሲጅን እና አልሚ ንጥረ ነገሮችን ወደ የሰውነት ሴሎች ያቀርባል.');
        });
        $botman->hears('.*ደም ለሰው እንዴት ይሰጣል.*|.*ደም ለሰው.*|.*ደም እንዴት ይሰጣል.*', function ($bot) {
            $bot->reply(' ደም ብዙ ጊዜ የሚሰጠው ካንኑላ በተባለ ትንሽ የፕላስቲክ ቱቦ ሲሆን ይህም በክንድዎ ውስጥ ባለው የደም
              ሥር ውስጥ ይገባል. ካንኑላ ከተንጠባጠብ ጋር የተገናኘ እና ደሙ በእንጠባቡ በኩል ወደ ክንድዎ ይገባል. ቧንቧው ለደም መሰጠት ወደ ደም መላሽ ቧንቧ ሲገባ
                     አንዳንድ ምቾት ማጣት ሊኖር ይችላል።');
        });
        $botman->hears('.*ደም ለማን.*ይሰጣል.*|.*ደም ለማን .*|.*ለማን ይሰጣል.*', function ($bot) {
            $bot->reply(' በመኪና አደጋ ወይም በተፈጥሮ አደጋዎች ከባድ ጉዳት ለደረሰባቸው ታካሚዎች ደም መውሰድ ጥቅም ላይ ይውላል. እንደ ሉኪሚያ ወይም የኩላሊት በሽታ ያሉ
                    የደም ማነስን የሚያመጣ በሽታ ያለባቸው ግለሰቦች ብዙውን ጊዜ ደም ደም ያስፈልጋቸዋል።');
        });

        $botman->hears('.*ደም መለገስ ጉዳት.*|.*መለገስ ያለው ጉዳት.*', function ($bot) {
            $bot->reply('ደም ልገሳ ደህንነቱ የተጠበቀ ነው። አዲስ፣ ንፁህ የሚጣሉ መሳሪያዎች ለእያንዳንዱ ለጋሽ ጥቅም ላይ ይውላሉ፣ ስለዚህ ደም በመለገስ በደም ወለድ ኢንፌክሽን
                      የመያዝ ስጋት አይኖርም። አብዛኛዎቹ ጤናማ ጎልማሶች አንድ ፒንት (ግማሽ ሊትር ያህል) ያለ ምንም የጤና ስጋት በደህና መለገስ ይችላሉ። ደም በመለገስ በጥቂት ቀናት ውስጥ 
                      ሰውነትዎ የጠፉትን ፈሳሾች ይተካል።');
        });

        $botman->hears('.*ባህርዳር ደም ባንክ.*|.*ባህርዳር ደም ባንክ.*የት.*', function ($bot) {
            $bot->reply('ባህር ዳር ደም ባንክ በአማራ ክልል ርዕሰ መዲና ባህር ዳር ኢትዮጵያ ውስጥ ይገኛል። ባህር ዳር በሰሜን ምዕራብ ኢትዮጵያ 
            ከአዲስ አበባ 565 ኪሎ ሜትር ርቀት ላይ ትገኛለች።');
        });

        $botman->hears('.*ቀጠሮዬ እንግዶችን ወይም ልጆችን ከእኔ ጋር ማምጣት.*|.*ልገሳ ቀጠሮዬ እንግዶችን ወይም ልጆችን ከእኔ.*', function ($bot) {
            $bot->reply('በዚህ ጊዜ፣ ተጨማሪ እንግዶችን ወይም ልጆችን ለጋሾች የልገሳ ቀጠሮአቸውን እንዲያጅቡ እየፈቀድን ነው። በስጦታ ጊዜ
                    እንግዶች በቦታው ላይ ያሉትን ማንኛውንም የደህንነት ፕሮቶኮሎች መከተል ይጠበቅባቸዋል። የእኛ ለጋሾች፣ በጎ ፈቃደኞች እና የሰራተኞቻችን 
                    ደህንነት ከሁሉም በላይ አስፈላጊ ነው። ክትትል የማያስፈልጋቸው እና የማያስተጓጉሉ ልጆች በመጠባበቅ ወይም በመዝናኛ ቦታ ላይ እንዲቀመጡ
                    እንኳን ደህና መጡ። ክትትል የሚፈልጉ ከሆነ ሌላ አዋቂ ሰው መገኘት አለበት።');
        });

        $botman->hears('.*ደም ልገሳ.*ሂደት.*|.*የደም ልገሳ.*', function ($bot) {
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

        $botman->hears('.*ደም ከመለገስ በኋላ ምን ማድረግ.*|.*ደም ከሰጠዉ በኋላ .*|.*ደም ከለገስኩ በኋላ.*|.*ደም ከለገስኩ በሗላ.*', function ($bot) {
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

        $botman->hears('.*የደም ልገሳ ምን ያህል ጊዜ ይወስዳል?.*|.*ደም ልገሳ ምን ያህል ጊዜ .*|.*ደም ለመስጠት ስንት ሰዓት .*|.*መለገስ.* ሰዓት.*', function ($bot) {
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
            $bot->reply("ይቅርታ: $user_question ስትል ምን ለማለት እንደፈለግክ እርግጠኛ አይደለሁም ።
            በተሻለ እንድረዳህ እባክህ ተጨማሪ አውድ ማቅረብ ወይም ጥያቄህን ማብራራት ትችላለህ::
                     ጥያቄህ ከደም ባንክ ፣ከደም አሰጣጥ፣አለጋገስ መውጣት የለበትም።");
        });

        $botman->hears('.*መቼ ደም እንውሰድ.*|.*ደም ያስፈልጋል.*', function ($bot) {
            $bot->reply('
            በደም መጥፋት ምክንያት በሰውነት ውስጥ ያለው ጉድለት 
            መታረም ሲያስፈልግ ሁል ጊዜ ደም ይሰጣል ፡፡ የቀይ ሴል ክምችት
             አብዛኛውን ጊዜ የጠፉትን ቀይ የደም ሴሎችን ለመተካት በከፍተኛ 
             የደም መጥፋት ውስጥ ጥቅም ላይ ይውላሉ ');
        });

        $botman->hears('.*ደም ከተሰጠ በኋላ ምን መጠበቅ አለብኝ.*|.*ደም.*ከተቀበለ.*ምን .*|.*ደም.*ከተቀበለ.*ያጋጥማል.*', function ($bot) {
            $bot->reply('
            የተመላላሽ ታካሚ ደም ከተሰጠ በኋላ ብዙውን ጊዜ ወደ ቤትዎ እንዲሄዱ ይፈቀድልዎታል። 
            እንደ ማቅለሽለሽ ወይም የደም ዝውውር ችግሮች ያሉ ምልክቶችን ከተመለከቱ ወዲያውኑ
             ለሐኪምዎ ማሳወቅ አለብዎት ፡፡ የሕክምናው ስኬታማነት በመደበኛ የደም ዝውውር
              ክትትል ይደረግበታል። በደም ምትክ ምክንያት የሚመጣውን የብረት ከመጠን በላይ
               ጫና በተመለከተ ሂሞግሎቢንን (ቀይ የደም ቀለም) እና ብረትን መለካት በተለይ አስፈላጊ ነው ፡፡ 
               የጎንዮሽ ጉዳቶች የሚከሰቱት አካላት ከመጠን በላይ በመጫናቸው በሚሰሩበት ጊዜ ብቻ ነው ፡፡');
        });
        $botman->hears('.*ደም ከለገስን በኋላ.*|.*ደም ከለገኩ ምን.*|.*ደም.*ከለገኩ.*ያጋጥመኛል.*|.*ደም.*ከለገኩ.*|.*ደም.*ከለገኩ በኋላ.*ምን ላድርግ.*', function ($bot) {

            $bot->reply('
            ደም ከለገሱ በኃላ፡-
            ተጨማሪ ፈሳሽ ለቀጣይ አንድ ወይም ሁለት ቀናት መዉሰድ
            ለአምስት ተከታታይ ቀናት ከባድ ስራ ያለመስራት/ከባድ ዕቃ ያለማንሳት
            የራስ ምታት/የማዞር ስሜት ከተሰማዎ ስሜቱ እስኪያልፍልዎ ለተወሰነ ጊዜ እግርዎን ወደላይ አድርገሁ ይንጋለሉ፡፡
            ደም ለመለገስ የተወጉበት ቦታ ላይ የታሰረልዎን ባንዴጅ/ፕላስተር ቢያንስ ከ4-5 ሰዓታት ያለመፍታት
            ባንዴጁን/ፕላስተሩን ከፈቱ በኃላ ቢደማብዎ ቦታዉ ላይ ጫን አድርገዉ በመያዝና እጅዎን ከፍ አድርገዉ በመያዝ ለአምስት ደቂቃዎች መቆየት
            መርፌ የተወጉበት ቦታ ላይ ባለዉ ቆዳዎ ስር ደም መፍሰስ ወይም መቅላት ካለዎ በረዶ አልፍ አለፍ እያሉ ለመጀመሪያ 24 ሰዓታት መያዝ
            እጅዎን ካመመዎ እንደ አሴታሚኖፌን/ፓራስታሞል ያሉ የህመም ማስታገሻ መድሃኒቶችን መዉሰድ፡፡ ነገር ግን እንደ አስፒሪን ወይም አይቡፕሮፌን(አድቪል) የመሳሰሉ መድሃኒቶችን ከመዉሰድ ይቆጠቡ፡');
        });


        $botman->hears('.*ለመለገስ.*ምን .*ላድርግ.*|.*ለመለገስ.*ዝግጅቶች.*|.*ደም ለመለገስ.*', function ($bot) {

            $bot->reply('
            ደም ለመለገስ የሚደረጉ ዝግጅቶች
        ሙሉ ጤነኛ መሆን
        ቢያንስ 17 አመትና ከዚያን በላይ መሆን፡
        ክብደትዎ ቢያንስ 45 ኪሎግራም መሆን፡፡
        አካላዊና ሌሎች የጤና ምርመራ ማለፍ የሚችል መሆን አለበት፡፡
        የሰዉነት ቀጭንና ወፍራም መሆን ደም ለመስጠት/ለመለገስም ሆነ ላለመለገስ እንደ ቅድመ ሁኔታ አያገለግልም፡፡ ይልቁንም ከላይ የተዘረዘሩትን ቅድመ 
        ሁኔታዎችን የሚያሟሉ ከሆነ ሰዉነትዎ ቀጭን ቢሆኑም እንኳ መለገስ ይችላሉ፡፡
        ደም ለመለገስ ካሰቡበት ቀን በፊት ባለዉ ምሽት በቂ እንቅልፍ ማግኘት የሚያስፈልግ ሲሆን ከመለገስዎ በፊት 
        ጥናማ ምግብ መመገብ፤ ስብነት ያለቸዉን( ለምሳሌ የአሳማ ስጋ)ና እንደ አይስ ክሬም ያሉ ምግቦችን ያለመመገብ፤ 
        እስከ 473 ሚሊ ሊትር የሚደርስ ተጨማሪ ፈሳሽ ከመለገስዎ በፊት መጠጣት መቻልና
         ፕላትሌትስ የሚለግሱ ከሆነ ከመለገስዎ ከሁለት ቀናት በፊት ጀምሮ አስፒሪን ያለመዉሰድ ይመከራሉ፡፡
                      ');
        });

        $botman->hears('.*ደም መለገስ.*ምን ችግር አለዉ.*|.*ደም መለገስ.*ችግር.*|.*ደም መለገስ.*ጉዳት|.*ደም መለገስ.*ጉዳቱ|.*ደም መለገስ.*ተፅኖ|.*ደም.*መለገስ.*ችግር.*|.*ደም መለገስ.*የሚመጣዉ ችግር አለ.*|.*ደም.*መለገስ.*የሚመጣዉ.*ችግር.*', function ($bot) {
            $bot->reply('
        ደም መለገስ የሚያመጣዉ ምንም ችግር የለም!!!
        ለያንዳንዱ ለጋሽ አዲስና ጤንነቱ የተጠበቀ ዕቃዎች ስለሚጠቀሙ ደም በመለገስዎ በደምና በደም ንኪኪ ሊተላለፉ የሚችሉ ኢንፌክሽኖች ሊይዝዎ አይችሉም፡፡
        እርስዎ ጤናማ ከሆኑ ጤንነትዎ ላይ ምንም አይነት አደጋ/ችግር ሳይከተል ደም መለገስ ይችላሉ፡፡ ደም በለገሱ በ24 ሰዓታት ዉስጥ ሰዉነትዎ ደም በመለገስ ወቅት ያጣዉን የፈሳሽ መጠን የሚተካ ሲሆን በተወሰኑ ሳምንታት ዉስጥ ደግሞ ሰዉነትዎ በደም መለገስ ወቅት ያጣዉን ቀይ የደም ሴሎችን ሙሉ በሙሉ ይተካል፡፡    
     ');
        });
        $botman->hears('.*ደም መለገስ .*የማይችሉ.*|.*ምን  አይነት .*የጤና ችግር.*|.*ደም የማይለገስ.*', function ($bot) {

            $bot->reply(
                'ተላላፊ በሽታ ያለባቸው ወይም እንደ ኤች አይቪ፣ደም ግፊት፣ሳንባ ነቀርሳ እና የመሳሰሉት፤ክብደቱ
                     ከ 50 ኪ.ግ በታች የሆነ ደመለገስ አይችልም ። ሌሎች ችግሮች ደግሞ በምርመራ ይጣራሉ።'
            );
        });

        ///////////////////

        $botman->hears('.*አመጋገብ.*|.*ከደም ልገሳ በፊት.*የአመጋገብ ገደቦች.*|.*ከልገሳ በፊት.*ምን እንብላ.*', function ($bot) {
            $bot->reply('ደም ከመለገስዎ በፊት በአጠቃላይ ምንም ልዩ የአመጋገብ ገደቦች የሉም. ይሁን እንጂ ከመለገሱ
                         በፊት ጤናማ፣ የተመጣጠነ ምግብ መመገብ እና በቂ እርጥበት መኖር አስፈላጊ ነው። ልገሳ ከመደረጉ 
                        በፊት የሰባ ወይም ቅባት የበዛባቸውን ምግቦች ማስወገድ በሂደቱ ውስጥ ችግሮችን ለመከላከል ይረዳል። 
                        በተጨማሪም ከመለገስዎ በፊት ቢያንስ ለ 24 ሰዓታት አልኮል ከመጠጣት መቆጠብ ጥሩ ነው.
                ');
        });
        $botman->hears('.*ደም ግፊት.*|.*ስኳር.*|.*ደም ግፊት.*መለገስ እችላለሁ.*|.*የስኳር በሽታ.*መለገስ ይቻላል.*', function ($bot) {
            $bot->reply('የደም ግፊት ወይም የስኳር በሽታ መኖር ደምን ከመለገስ በቀጥታ አያግድዎትም። ይሁን እንጂ ሁኔታዎ 
                    በደንብ ቁጥጥር ሊደረግበት ይገባል, እና በስጦታ ጊዜ በአጠቃላይ ጥሩ ጤንነት ላይ መሆን አለብዎት. 
                    ተቀባይነት ባለው ገደብ ውስጥ መሆናቸውን ለማረጋገጥ በምርመራው ሂደት ውስጥ የደም ግፊት እና የደም
                    ስኳር መጠን ሊረጋገጥ ይችላል። በግል ሁኔታዎ ላይ ብቁ መሆንዎን ለመወሰን ከደም ልገሳ ማእከል ወይም ከጤና እንክብካቤ አቅራቢዎ ጋር መማከር ይመከራል።
                ');
        });
        $botman->hears('.*በእርግዝና ወቅት ወይም ጡት በማጥባት ጊዜ ደም መለገስ ይቻላል?.*|.*በእርግዝና ወቅት.*መለገስ እችላለሁ.*|.*ጡት በማጥባት.*መለገስ ይቻላል.*', function ($bot) {
            $bot->reply('በአጠቃላይ በእርግዝና ወቅት ደም መለገስ አይመከርም. እርግዝና በሰውነት ላይ ተጨማሪ ፍላጎቶችን ያመጣል, 
                        እና ደም መለገስ በእናቲቱ እና በማደግ ላይ ባለው ፅንስ ላይ ተጽእኖ ሊያሳድር ይችላል. በተመሳሳይም ደም ለመለገስ 
                        ጡት ካጠቡ በኋላ መጠበቅ ጥሩ ነው. ደም መለገስ ለጊዜው በሰውነትዎ ውስጥ ያለውን የፈሳሽ መጠን ሊጎዳ ይችላል, እናም 
                        በዚህ ጊዜ ውስጥ የራስዎን ጤንነት እና የልጅዎን ጤና ቅድሚያ መስጠት አስፈላጊ ነው.
                ');
        });
        $botman->hears('.*ድጋሚ መለገስ.*ይቻላል.*', function ($bot) {
            $bot->reply('ደም የመለገስ ታሪክ መኖሩ ዳግመኛ ከመለገስ አያግድም። እንደ እውነቱ ከሆነ, መደበኛ ደም ለጋሾች
                         ይበረታታሉ እና ያደንቃሉ. ይሁን እንጂ ሰውነትዎ የጠፉትን የደም ክፍሎች ለመሙላት በቂ ጊዜ ለመስጠት
                         በስጦታ መካከል ልዩ ክፍተቶች ሊኖሩ ይችላሉ። የልገሳ ድግግሞሽ መስፈርቶች እንደ
                         ሀገር እና ድርጅት ይለያያሉ። ለመጎብኘት ያቀዱትን የደም ልገሳ ማእከል ልዩ መመሪያዎችን ማማከር ጥሩ ነው
                ');
        });
        $botman->hears('.*ደም አይነቴን እንዴት ልወቅ?.*|.*ደም አይነቴን.*እንዴት ልወቅ.*|.*ደም አይነት.*ለማወቅ.*', function ($bot) {
            $bot->reply('መጀመሪያ ይመዝገቡ ፤ቀጠሮ ይስይዙ፤በቀጠሮ ቀን በሚደረግልዎ ሙሉ ምርመራ ማወቅ ይችላሉ
                        መመሪያ ለማግኘት የደም ልገሳ ማእከል ወይም የጤና ማእከላትን ያናግሩ።
                        ስልክ፡+251948758542
                        +25158252 2345
                ');
        });
        $botman->hears('.*ካንሰር.*', function ($bot) {
            $bot->reply('በካንሰር በሽታ ከተያዙ ደም መለገስ አይመከርም ነገር ግን ፣ ህክምናው ከተጠናቀቀ በኋላ ያለው የጊዜ ርዝመት 
                         በተቋሙ ይወሰናል። በአንዳንድ ሁኔታዎች የካንሰር በሽታ ያለባቸው ግለሰቦች ደም ለመለገስ ብቁ ሊሆኑ ይችላሉ,
                         መመሪያ ለማግኘት የደም ልገሳ ማእከል ወይም የጤና ማእከላትን ያናግሩ።
                         ስልክ፡    +251948758542
                         +25158252 2345');
        });
        $botman->hears('.*በቅርቡ እኔ ራሴ ደም ከወሰድኩ ደም መለገስ እችላለሁ?.*|.*ደም ከወሰድኩ.*መለገስ.*|.*በቅርቡ እኔ.*ደም ከተቀበልኩ.*መለገስ እችላለሁ.*', function ($bot) {
            $bot->reply('በቅርቡ ደም ከወሰዱ ደም ከመለገስዎ በፊት 12 ወር ጊዜ ያህል መታገስ ይመከራል. ይህም ሰውነትዎ እንዲረጋጋ በቂ ጊዜ እንዲሰጥ እና 
                    የተለገሰው ደም በቀድሞው ደም ላይ ጣልቃ እንደማይገባ ለማረጋገጥ ነው.');
        });
        $botman->hears('.*ደም መለገሻ ቦታ.*|.*ደም የት ልለግስ .*', function ($bot) {
            $bot->reply('በቅርብ ያሉ የደም ወኪሎችን ለማወቅ እነዚህን ስልክ ቁጥሮች ይገልገሉ።
                       +251948758542
                       +25158 253 3654');
        });

        $botman->hears('.*ጉንፋን ካለብኝ ደም መለገስ እችላለሁ?.*|.*ጉንፋን.*መለገስ .*|.*ሳል.*', function ($bot) {
            $bot->reply('በአሁኑ ጊዜ ጉንፋን ካለብዎ ደም ከመለገስዎ በፊት ሙሉ በሙሉ እስኪያገግሙ
                        ድረስ እንዲጠብቁ ይመከራል። ይህም ለጋሹም ሆነ ለተቀባዩ ደኅንነት ለማረጋገጥ ነው፣ 
                        ምክንያቱም ሕመሙ የተለገሰውን ደም ጥራት ሊጎዳ ይችላል።');
        });
        $botman->hears('.*ልገሳ ጉዳቶች.*|.*የደም ልገሳ.*የጎንዮሽ ጉዳቶች.*|.*መለገስ.*ጉዳቱ .*', function ($bot) {
            $bot->reply('የተለመዱ የጎንዮሽ ጉዳቶች ጭንቅላት ማዞር ወይም የድካም ስሜትን ያካትታሉ. አንዳንድ ለጋሾች በመርፌ
                    ቦታ ላይ ቁስል ሊሰማቸው ይችላል. እነዚህ የጎንዮሽ ጉዳቶች አብዛኛውን ጊዜ 
                    ጊዜያዊ ናቸው እና ከለገሱ በኋላ በማረፍ እና በማድረቅ ሊቀንሱ ይችላሉ።');
        });

        $botman->hears('.*የጤና እክል ካለብኝ ወይም መድሃኒት ከወሰድኩ ደም መለገስ እችላለሁ.*|.*ጤና ችግር.* መለገስ.*|.መድሃኒት ከወሰድኩ.* መለገስ.*', function ($bot) {
            $bot->reply('እንደ ልዩ የሕክምና ሁኔታ እና መድሃኒት ይወሰናል. አንዳንድ ሁኔታዎች ወይም መድሃኒቶች 
                        አንድ ሰው ደም እንዳይለግስ ለጊዜው ወይም እስከመጨረሻው ሊያሳጣው ይችላል, ሌሎች ደግሞ ችግር ላይፈጥሩ ይችላሉ.
                        በምርመራው ሂደት ውስጥ የእርስዎን የህክምና ታሪክ እና መድሃኒቶችን ማሳወቅ አስፈላጊ ነው።');
        });
        $botman->hears('.*ከተጓዝኩ ደም መለገስ.*|.ሀገር ከተጓዝኩ.*ደም መለገስ እችላለሁ.*|.* ረጅም ጉዞ እጓዛለሁ.* መለገስ እችላለሁ .*', function ($bot) {
            $bot->reply('ወደ ተለያዩ ሀገሮች የሚደረግ ጉዞ ለአንዳንድ በሽታዎች የመጋለጥ እድልን መሰረት በማድረግ
                        የተለያዩ ገደቦች ሊኖሩት ይችላል.በቅርቡ ረጅም ጉዞ ፣ከባድ የአካል እንቅስቃሴ የሚያደርጉ ከሆነ መለገስ አይመከርም');
        });
        $botman->hears('.*ደም መለገስ  ህመም.*|.* ደም መለገስ ጊዜያዊ.*ህመሞች.*|.*ደም ልገሳ  .*ስሜቶች  .*', function ($bot) {
            $bot->reply('አንዳንድ ለጋሾች በመርፌ በሚወጉበት ጊዜ ትንሽ ምቾት ላይሰማቸው ይችላል, ነገር ግን አብዛኛውን ጊዜ አጭር እና ትንሽ ህመም ነው.
                        ትክክለኛው የደም ልገሳ ሂደት ምንም እንኳን ትንሽ ህመም ቢኖረዉም ከምናገኘው ብዙ ነገር ጋር ሲወዳደር ምንም ነው።');
        });
        $botman->hears('.*ደም መስጠት የሚችለው ማን ነው.*|.*ደም መስጠት የሚችለው.*', function ($bot) {
            $bot->reply('በአጠቃላይ የተወሰኑ መስፈርቶችን የሚያሟሉ ግለሰቦች ደም መለገስ ይችላሉ. ይህም በጥሩ ጤንነት ላይ መሆንን፣ የዕድሜ መስፈርቶችን ማሟላት (ብዙውን ጊዜ ከ18
                        እስከ 65 ዓመት ባለው የዕድሜ ክልል ውስጥ ያሉ) እና በቂ የሆነ የሂሞግሎቢን 
                        መጠን መኖርን ይጨምራል ');
        });
        $botman->hears('.*ደም ልገሳ መስፈርቶች.*|.*መስፈርቶች.*|.*መስፈርት.*|.*ለደም ልገሳ .*ብቁነት መስፈርቶች .*ምንድናቸው?.*', function ($bot) {
            $bot->reply('ለደም ልገሳ የብቃት መስፈርት በአገሮች እና በድርጅቶች መካከል ትንሽ ሊለያይ ይችላል።
                        የተለመዱ መመዘኛዎች በጥሩ ጤንነት ላይ መሆን፣ የክብደት መስፈርት (ከ 45 ክግ የሚበልጥ)፣
                      አንዳንድ የጤና እክሎች ወይም ኢንፌክሽኖች አለመኖር እና ከፍተኛ ተጋላጭነት ባላቸው ስራወች  ውስጥ አለመሳተፍን ያካትታሉ። ');
        });

        $botman->hears('.*ደም ለመልገስ.*ከቀድሞዉ ልገሳ ምን ያህል ጊዜ .*|.*ደም ለመልገስ.*ከቀድሞዉ ልገሳ ምን ያህል ጊዜ .*ልዩነት አለዉ .*', function ($bot) {
            $bot->reply('ለደም ልገሳ እንደ  ሁኔታወች ቢለያይም በትንሹ 3 ወር ይስፈልጋል');
        });
        $botman->hears('.*ምን ያህል ጊዜ ደም መለገስ እችላለሁ?|.*ስንት ጊዜ መለገስ.*እችላለሁ.*', function ($bot) {
            $bot->reply('ለደም ልገሳ እንደ  ሁኔታወች ቢለያይም በትንሹ 3 ወር ይስፈልጋል');
        });
        $botman->hears('.*ደም ልገሳ ሂደቱ.* ምን ያህል ጊዜ.*|.*መለገስ.*ስንት ሰአት .*ይወስዳል .*|.*መለገስ*ስንት ሰአት .*ይፈጃል .*', function ($bot) {
            $bot->reply('የደም ልገሳ ሂደቱ ከ30 እስከ 60 ደቂቃ አካባቢ ይወስዳል። ይህም ምዝገባን፣ የህክምና ምርመራን፣ ልገሳን እና ከዚያ በኋላ የአጭር ጊዜ ምልከታ ጊዜን ይጨምራል።');
        });
        $botman->hears('.*ደም ልገሳ ሂደቱ.* ምን ያህል ጊዜ.*|.*መለገስ.*ስንት ሰአት .*ይወስዳል .*|.*መለገስ*ስንት ሰአት .*ይፈጃል .*', function ($bot) {
            $bot->reply('የደም ልገሳ ሂደቱ ከ30 እስከ 60 ደቂቃ አካባቢ ይወስዳል። ይህም ምዝገባን፣ የህክምና ምርመራን፣ ልገሳን እና ከዚያ በኋላ የአጭር ጊዜ ምልከታ ጊዜን ይጨምራል።');
        });

        $botman->hears('.*ሂደት.*|.*የደም ልገሳ.*', function ($bot) {
            $bot->reply('ደም መለገስ ቀላል ነገር ነው, ነገር ግን በሌሎች ህይወት ላይ ትልቅ ለውጥ ሊያመጣ ይችላል. እርስዎ ከደረሱበት ጊዜ አንስቶ እስከ ወጡበት ጊዜ ድረስ ያለው የልገሳ ሂደት አንድ ሰዓት
                         ያህል ይወስዳል። ልገሳው በራሱ በአማካይ ከ8-10 ደቂቃ ብቻ ነው። በሂደቱ ውስጥ ያሉት ደረጃዎች፡-
                ምዝገባ
    
                 1.የለጋሾች ምዝገባን ያጠናቅቃሉ፣ ይህም እንደ ስምዎ፣ አድራሻዎ፣ ስልክ ቁጥርዎ እና ለጋሽ መለያ ቁጥር (ካላችሁ) ያሉ መረጃዎችን ያካትታል።
                    2. የለጋሽ ካርድ፣ የመንጃ ፍቃድ ወይም ሌላ ሁለት አይነት መታወቂያ እንዲያሳዩ ይጠየቃሉ።
    
                የጤና ታሪክ እና ሚኒ ፊዚካል
    
                   1. ስለ ጤና ታሪክዎ እና ስለተጓዙባቸው ቦታዎች በግል እና በሚስጥር ቃለ መጠይቅ ወቅት አንዳንድ ጥያቄዎችን ይመልሳሉ ');
        });
        ////////////////

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
