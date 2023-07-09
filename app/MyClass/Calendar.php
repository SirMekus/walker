<?php
namespace App\MyClass;

class Calendar {  

    /********************* PROPERTY ********************/  
    private $dayLabels = ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"];
     
    private $currentYear=0;
     
    private $currentMonth=0;
     
    private $currentDay=0;
     
    private $currentDate=null;
     
    private $daysInMonth=0;

    private $date = null;
     
    /********************* PUBLIC **********************/  
        
    /**
    * print out the calendar
    */
    public function show($date=null) {
        
        $this->date = carbon($date)->toDateString();

        $year  = carbon($date)->year;
         
        $month = carbon($date)->month;
         
        $this->currentYear=$year;
         
        $this->currentMonth=$month;
         
        $this->daysInMonth=$this->_daysInMonth($month,$year);  
         
        $content='<div id="calendar">'.
                        '<div class="box">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="box-content">'.
                                '<div class="d-flex flex-shrink-0 justify-content-between px-4">'.$this->_createLabels().'</div>';   
                                $content.='<div class="clear"></div>';       
                                 
                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){
                                    $content.='<div class="d-flex flex-shrink-0 justify-content-between px-4">';  
                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){
                                        $content.=$this->_showDay($i*7+$j);
                                    }
                                    $content.='</div>';
                                }
                                 
                                $content.='<div class="clear"></div>';     
             
                        $content.='</div>';
                 
        $content.='</div>';
        return $content;   
    }
     
    /********************* PRIVATE **********************/ 
    /**
    * create the li element for ul
    */
    private function _showDay($cellNumber){
         
        if($this->currentDay==0){
             
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
                     
            if(intval($cellNumber) == intval($firstDayOfTheWeek)){
                 
                $this->currentDay=1;
                 
            }
        }
         
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
             
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
             
            $cellContent = $this->currentDay;
             
            $this->currentDay++;   
             
        }else{
             
            $this->currentDate =null;
 
            $cellContent=null;
        }

        if(!empty($this->currentDate) and carbon($this->currentDate)->isSameDay(carbon($this->date))){
            $content = '<span class="text-white ps-3'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
            ($cellContent==null?'mask':'').'" id="currentDate"><a class="bg-primary text-decoration-none btn btn-sm text-white" href="'.request()->fullUrlWithQuery(['date'=>$this->currentDate]).'">'.$cellContent.'</a></span>';
        }
        else{
            $content = '<span class="ps-3 '.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
            ($cellContent==null?'mask':'').'"><a class="text-decoration-none btn btn-sm" href="'.request()->fullUrlWithQuery(['date'=>$this->currentDate]).'">'.$cellContent.'</a></span>';
        }
        return $content;
    }
     
    /**
    * create navigation
    */
    private function _createNavi(){
        return
            '<div class="header">'.
                '<a class="prev" href="'.request()->fullUrlWithQuery(['date'=>carbon($this->date)->subMonth()->toDateString()]).'">&lt;</a>'.
                    '<span class="title">'.carbon($this->date)->format('F Y').'</span>'.
                '<a class="next" href="'.request()->fullUrlWithQuery(['date'=>carbon($this->date)->addMonth()->toDateString()]).'">&gt;</a>'.
            '</div>';
    }
    
    /**
    * create calendar week labels
    */
    private function _createLabels(){
                 
        $content='';
         
        foreach($this->dayLabels as $index=>$label){
            $content.='<span class="'.($label==6?'end title':'start title').' title ps-3">'.$label.'</span>';
        }
         
        return $content;
    }
     
     
     
    /**
    * calculate number of weeks in a particular month
    */
    private function _weeksInMonth($month=null,$year=null){
         
        if( null==($year) ) {
            $year =  date("Y",time()); 
        }
         
        if(null==($month)) {
            $month = date("m",time());
        }
         
        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);
         
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
         
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
         
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
         
        if($monthEndingDay<$monthStartDay){
             
            $numOfweeks++;
         
        }
         
        return $numOfweeks;
    }
 
    /**
    * calculate number of days in a particular month
    */
    private function _daysInMonth($month=null,$year=null){
         
        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }
}