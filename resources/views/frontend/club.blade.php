@extends('frontend.layout.master', ['page_title' => '>SUPW/Club Activites'])
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/chairman-desk.css') }}" />
@endpush

@section('content')
    <div class="bg-light">
        <div class="container about-section">
            <div class="row club-section" style="text-align:justify;">


                <div class="col-md-8">
                    <h2 class="pt-4 font-weight-bold">Socially Useful Productive Work/CLUBS</h2>

                    <p>
                        As per CBSE Guidelines the school has implemented SUPW / Club Activity Classes for students of
                        Classes II to VIII. The various socially useful activity Clubs include Art & Craft Club, Yoga Club,
                        Karate Club, Dance Club, Music Club, Skating Club, Science Club, Literary (English and
                        Hindi) Club , Social Science Club and Mathematics Club.
                    </p>
                </div>
                <div class="col-md-4">
                    <br>
                    <a href="#">
                        <div class="item animated wow fadeIn">
                            <img src="{{ asset('frontend/images/club.png') }}" alt="" width="100%"
                                style="max-width: 342px;">
                        </div>
                    </a>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">

                    <h3 class=""> <b>Literary (English & Hindi) Club</b></h3>
                    {{-- <h4>THE IMPORTANCE OF ENGLISH LANGUAGE </h4> --}}

                    Literary Club serves important function allowing participants to use and practice Literature in an
                    informal setting. Activities such as debates, speeches, recitation, plays, storytelling etc. are held in
                    these clubs. <br> <br>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/Hindi.jpg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/Eng.jpg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                    </div>

                    {{-- <b>LISTENING</b> -This is important for learning not only English or any other language but for any
                learning. A good listener understands concepts better,be it language syntaxes,vocabulary or even
                Science and Economics. Listening skills
                are tested with Listening Passages and putting questions This encourages a healthy competitive
                spirit and focus also.<br> <br>


                <b>SPEAKING-</b>Speaking is a very important skill and the one that is the best too to impress and
                make an impact. Listening to others and speaking one’s point of view and a way to enhance
                vocabulary, sentence formating and expression.
                This is a skill that is one of the most important tool for success. We have class debates and
                presentations to help children acquire good speaking skills. <br> <br>


                <b>READING –</b> A good writer and communicator has one secret weapon, the the habit of reading. It
                enhances knowledge, creativity, vocabulary and expression. It makes us view things from other’s
                point of view and that enriches one’s
                ability to present the same things in myriad ways Any good writer or communicator will vouch for
                it.<br> <br>


                We have a well – stocked library. As parents,reading bedtime stories is a very effective way to
                ignite interest and curiosity. The mind registers the turn of speech and language. Keeping a cell
                phone and television free time and a
                family discussion on a book or the latest world news and then pointing that out in the newspaper is
                a good way to awaken the spark in the young minds.<br> <br>


                We have heard people say that the children have no time to read their text books,when will they find
                time to read story books? The answer is help set aside some time from their video games,television
                and chatting with friends
                routine.Many young parents in the 70’s read the books their children read and discussed it at dinner
                time. Just the dinner time together without TV can work wonders. Young parents may definitely
                implement it.<br> <br>

                <h3>Some books that should be in everyone’s bucket list</h3>
                1. ADVENTURES OF TOM SAWYER BY MARK TWAIN<br>
                2. LITTLE WOMEN BY L.M.ALCOTT<br>
                3. TALES FROM SHAKESPEARE BY CHARLES LAMB AND MARY LAMB<br>
                4. THE BOY,THE MOLE,THE FOX AND THE HORSE BY CHARLIE MACKESY<br>
                5. ADVENTURES OF RUSTY BY RUSKIN BOND<br><br>
                6. A few pages a day is enough! Watch your child develop an analytical mind,a confident demeanor and
                perspective!!<br><br>

                <b>WRITING-</b>Writing is the assessment of the final outcomes of all the listening,reading,
                studying, discussing and questioning things. The exam results cannot be as expected if the ideas are
                not put into words well and concepts are
                not grasped well,be it any subject. Once the first three LSR are taken care of, W follows. You will
                be surprised to see how creative, expressive, verbose or laconic as required, your child will be We
                give a variety of topics for
                uniting,have elaborate discussions on it before asking the children to write Let them write on their
                own ,we are there to take care of the errors. But please remember LSWR.W always follows LSR .Adherin
                to these small steps and changes
                in routine can go a long way in making the children proficient in the language, an impressive
                speaker and exceptional writer.<br><br>


                1. HINDI<br>
                2. FRENCH<br>
                3. ECO CLUB<br> <br>
                <h3>Aims and Objectives</h3>
                <ul>
                    <li>To develop a love for nature and its symphony with changing seasons </li>
                    <li>To care for the environment and implement all the effective practices like shunning polybags
                        , to protect it.</li>
                    <li>Inculcate ways to recycle and reuse as a way to express reverence for planet Earth</li>
                    <li>To promote indepth knowledge of ecological balance and ways to adopt eco-friendly ways.</li>
                    <li>Activities aimed at promoting Environment Consciousness</li>
                </ul> --}}
                    <h3><b>Science Club</b></h3>
                    Science club helps in the development of scientific attitude and develops a genuine interest in science
                    and scientific activities, supplements the work of classroom and the laboratory.<br> <br>

                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/Science 1.jpg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/Science 2.jpg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                    </div>

                    {{-- Earth Day-It is celebrated in the school on 21st April every year. The Eco club organises a special
                assembly where children speak on the environment and need to take care of planet Earth. Skits ,
                debates and painting and
                quiz contests are organized to mark the day.<br> <br>

                Participation in Annual Exhibition - Environment related projects and models like rain water
                harvesting are made by the members of the Eco Club. A Best out of waste section is organized to
                display the creative
                ideas and models of children.<br> <br>

                All innovative and out of the box ideas are encouraged by the Eco Club. We live up to our motto
                Preserve, Promote and Persevere.<br> <br> --}}

                    <h3><b>Mathematics Club</b></h3>
                    The Math Club is intended to give students a platform to share their interests in mathematics. Typical
                    activities include problem solving sessions, puzzle solving, reasoning, student talks etc.<br> <br>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/maths 1.jpg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/maths 2.jpg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                    </div>

                    {{-- <h3>The club would include the following features:</h3>
                <ul>
                    <li>Regular discussions on the scientific researches involved with debates, quizzes,
                        observational visits, and awareness campaigns.</li>
                    <li>The activities would be conducted on both physical as well as virtual platforms to engage a
                        greater number of students following the protocols of Covid-19.</li>
                    <li>Students would be given the opportunities visit the newly built science and ATL labs
                        regularly.</li>
                    <li>Students would be familiarized by the technologies blended with science in the science labs
                        and can also learn the concepts or robotics and electricity in depths.</li>
                    <li>Students can demonstrate their work in the yearly science exhibitions and compete in
                        technical/non-technical competitions also.</li>
                    <li>Students would improvise their observational skills, communication knowledge and improve
                        their scientific growth in their coming future.</li>
                    <li>The club would involve the activities on the following topics:</li>
                    <li>Fun with magnets – Using magnets and identifying magnetic and non-magnetic objects.</li>
                    <li>Sink or float - Activities on the principles of floatation.</li>
                    <li>Air pressure- Fun games like creation of balloon activities on the laws of motion and how a
                        rocket works.</li>
                    <li>Observational activities- Visits to gardens, museums would make the students admire the
                        beauty of nature.</li>
                </ul>

                <b>Plants - A wonder -</b> Different activities like leaves collection, analysing growth of plants,
                conduction in the stems and many other topics would be covered to enhance the knowledge of students.
                <br> <br>

                Human body and its working: Students would be highlighted with the working of a human body through
                activities like creating clay models, puzzles of bones for quenching their curiosities towards the
                explicable functioning of human body. <br><br> --}}

                    <h3><b>Social Science Club</b></h3>

                    Social Science Club aims at making children capable of becoming responsible, productive and useful
                    members of society. It creates interest and makes the students active in the subject and encourages
                    intellectual curiosity among the students. <br> <br>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/S Sc 1.jpg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/S Sc 2.jpg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                    </div>
                    {{-- <ul>
                    <li>The club includes following activities:</li>
                    <li>Weekly debates and quizzes.</li>
                    <li>Poster making and slogan writing competitions.</li>
                    <li>Regular science discussions.</li>
                    <li>Seed Germination and conduction of water through stem.</li>
                    <li>Model making activities</li>
                    <li>Lab based activities.</li>
                </ul> --}}

                    <h3><b>ART AND CRAFT </b></h3>
                    Art & Craft club is a platform to develop aesthetic values and enhance the creative skills and artistic
                    talents of students.<br> <br>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/Art 1.jpg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/Art 2.jpg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                    </div>

                    <h3> <b>Music Club</b> </h3>
                    The purpose of Music Club is to facilitate music education, provide a practice space for students and
                    coordinate student performances on and off-campus. <br><br>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/Music 1.jpeg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/Music 2.jpeg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                    </div>

                    <h3> <b>Dance Club</b></h3>
                    The purpose of the Dance Club is to teach students in dance styles from different cultural backgrounds
                    such Classical, Contemporary, Salsa, Modern and Hip Hop. <br> <br>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/Dance 1.jpeg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/Dance 2.jpeg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                    </div>

                    <h3> <b>Karate club</b></h3>
                    The purpose of Karate Club is to develop well-balanced mind and body, through training in fighting
                    techniques. It trains students in Self Defense.<br> <br>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/Karate 1.jpg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/Karate 2.jpg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                    </div>
                    <h3><b>YOGA CLUB</b> </h3>
                    The objective of yoga club is to practice yoga postures while learning about how yoga can be used to
                    manage stress, improve the mind-body connection, and increase strength and flexibility.<br>
                    <br>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/yoga 1.jpg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/yoga 2.jpg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                    </div>

                    <h3><b>Skating Club</b></h3>
                    Skating Club trains students in skating (both Quad and Liner) and prepare them for various levels of
                    skating competition. <br><br>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/Skating 1.jpg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 alert " style="text-align:justify">
                            <div class="sport-card card">
                                <img src="{{ asset('supwclub/Skating 2.jpg') }}" class="card-img-top" alt="Image 1">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
