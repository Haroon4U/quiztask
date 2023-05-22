<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;
use App\Models\Question;
use App\Models\QuestionOptions;
use App\Models\Result;
use App\Models\Attepmtquestion;
use DB;
use Session;
class TemplateController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return;
        return view('login');
    }

        public function user(Request $req){
            $validate=$this->validate($req,[
                'username' => 'required',
    
            ]);
    
            if ($validate== true) {
                $username = $req['username'];
                $counter =1;
                session()->put('username', $username);
                $user = array( 'name' => $username, ); 
                DB::table('users')->insert($user);
                return response()->json([
                    'success' => true,
                    'message' => 'New Session Login',
                    ]);
            }else{
                return response()->json(['error'=> true,'message' => 'Please fill The name First']);
            }
        }
        public function quiz(Request $req){
            if (!session()->has('username')) {
                return redirect('/');
            }else{
                $counter =1;
                $sessionname = session()->get('username');
                $question = Question::get()->shuffle();
                return view('quiz',compact('question','counter'));
                // return response()->json($question);
            }

        }
        public function store(Request $request){
            if (!session()->has('username')) {
                return redirect('/');
            }else{
                $counter = $request->input('counter');
                $counter++;
                $sessionname = session()->get('username');
                $user_id = DB::table('users')->where('name',$sessionname)->first();
                $questions = Question::get()->shuffle();
                $attmtotal = Attepmtquestion::where('userid',$user_id->id)->get();
                // return response()->json(count($attmtotal));
                if(count($questions) == count($attmtotal)){
                        $correct =  Attepmtquestion::where('userid',$user_id->id)->where('score',1)->count();
                        $wrong =  Attepmtquestion::where('userid',$user_id->id)->where('score',0)->count();
                        $user = array( 'correct' => $correct, 'wrong' => $wrong, 'userid' => $user_id->id, ); 
                        
                        DB::table('finalresults')->insert($user);
                        $finalresults =Result::where('userid',$user_id->id)->first();
                        // dd($finalresults);
                    return view('finish',compact('finalresults'));
                }else{

                
                    foreach ($request->input('questions', []) as $key => $question) 
                    {
                        if(!empty($request->input('answers.'.$question))){
                            $option =QuestionOptions::where('id',$request->input('answers.'.$question))->first();
                            $score = $option->correct;
                        }else{
                            $score ='';
                        }
                        
                        $user = array( 'queid' => $question, 'optid' => $request->input('answers.'.$question),'score' => $score, 'userid' => $user_id->id, ); 
                        DB::table('attepmtquestions')->insert($user);
                    }
                    return view('quiznext',compact('questions','counter'));
                }
                
  

                // return response()->json($question);
            }
        }
        public function logout(Request $request){
            
            if (!session()->has('username')) {
                return redirect('/');
            }else{
                session()->flush();
                return redirect('/');
            }
            
        }






}
