<?php

namespace App\Http\Controllers;

use App\Models\arrayTable;
use Illuminate\Http\Request;
use Config;

class ArrayTableController extends Controller
{
    public function datain_ruch5()
    {
        $ruch5_data = array(
            array('1 로토무','4 거북왕','2 돈크로우','3 가디안','2 킬리아','2 야도란','2 또가스','2 음뱃'),
            array('1 랄토스','1 음뱃','1 랄토스','4 코바르온','3 또도가스','4 코바르온','2 나인테일','4 랜드로스'),
            array('1 포곰곰','1 먹고자','1 메탕','2 또가스','4 테라키온','1 음뱃','2 돈크로우','5 황혼의갈기'),
            array('4 잠만보','1 로토무','5 뮤츠','2 이븐곰','2 이븐곰','2 또가스','4 솔록','4 토네로스'),
            array('1 먹고자','4 이상해꽃','4 메타그로스','2 메탕구','1 포니타','4 메로엣타','2 야도란','1 야돈'),
            array('3 날쌩마','3 야도킹','3 날쌩마','2 이븐곰','3 루카리오','2 루카리오','2 먹고자','1 메탕'),
            array('3 솔록','4 음번','3 로토무','3 이븐곰','2 야도란','1 먹고자','1 니로우','1 로토무'),
            array('4 마나피','2 이븐곰','2 먹고자','1 포니타','5 알세(노말)','3 피카츄','3 타타륜','2 루카리오'),
            array('1 먹고자','1 니로우','3 음번','5 알세(풀)','1 야돈','5 디안시','1 니로우','2 이븐곰'),
            array('3 돈크로우','2 날쌩마','2 로토무','2 돈크로우','1 랄토스','1 식스테일','4 잠만보','2 돈크로우'),
            array('4 솔록','2 킬리아','2 먹고자','2 먹고자','2 돈크로우','2 이븐곰','2 킬리아','3 가디안'),
            array('1 야돈','3 메타그로스','3 나인테일','4 메타그로스','2 메탕구','3 날쌩마','2 먹고자','1 니로우'),
            array('1 니로우','2 야도란','3 타타륜','3 케르디오','1 식스테일','2 루카리오','4 랜드로스','3 야도킹'),
            array('5 새벽의날개','5 황혼의갈기','1 먹고자','1 로토무','4 루카리오','4 볼트로스','3 피카츄','1 식스테일'),
            array('2 먹고자','1 포니타','3 피카츄','1 음뱃','1 랄토스','3 이븐곰','4 케르디오','1 먹고자'),
            array('4 이상해꽃','2 또가스','2 루카리오','1 니로우','4 가디안','1 리오르','1 니로우','2 돈크로우'),
            array('2 돈크로우','4 케르디오','2 또가스','4 잠만보','2 먹고자','1 식스테일','3 로토무','2 먹고자'),
            array('2 나인테일','1 리오르','1 로토무','1 포니타','3 돈크로우','2 야도란','3 야도킹','1 포니타'),
            array('5 뮤','2 돈크로우','1 니로우','2 메탕구','2 또가스','4 잠만보','3 케르디오','2 루카리오'),
            array('4 리자몽','1 포곰곰','2 음뱃','3 피카츄','2 음뱃','2 나인테일','5 제르네아스','2 메탕구'),
            array('2 로토무','2 로토무','3 루카리오','5 뮤','5 알세(물)','2 음뱃','3 솔록','3 타타륜'),
            array('2 킬리아','4 메로엣타','2 야도란','1 식스테일','1 먹고자','3 타타륜','2 돈크로우','2 이븐곰'),
            array('2 날쌩마','2 먹고자','4 코바르온','1 메탕','2 야도란','1 야돈','4 루나톤','2 야도란'),
            array('2 메탕구','2 나인테일','5 알세(불꽃)','2 야도란','2 나인테일','2 먹고자','3 음번','2 날쌩마'),
            array('3 또도가스','2 루카리오','1 음뱃','2 나인테일','1 포니타','4 야도킹','2 로토무','1 포곰곰'),
            array('1 식스테일','3 이븐곰','1 포니타','3 루나톤','1 메탕','1 포니타','2 메탕구','2 나인테일'),
            array('1 랄토스','2 나인테일','4 루카리오','2 음뱃','2 야도란','1 포곰곰','4 루나톤','2 날쌩마'),
            array('2 킬리아','4 메타그로스','1 음뱃','2 킬리아','2 루카리오','4 케르디오','2 날쌩마','4 이상해꽃'),
            array('3 루카리오','5 앤테이','4 마나피','4 볼트로스','3 메타그로스','2 날쌩마','5 새벽의날개','1 리오르'),
            array('2 메탕구','4 랜드로스','4 가디안','4 테라키온','1 메탕','3 메타그로스','1 랄토스','3 솔록'),
            array('2 음뱃','2 또가스','3 솔록','1 리오르','1 로토무','3 로토무','4 야도킹','3 루나톤'),
            array('4 루나톤','1 메탕','1 리오르','1 랄토스','3 피카츄','1 메탕','1 로토무','2 로토무'),
            array('4 야도킹','2 음뱃','2 음뱃','4 메로엣타','5 테오키스','5 실버디','2 루카리오','1 음뱃'),
            array('2 이븐곰','3 나인테일','2 메탕구','1 음뱃','3 가디안','2 메탕구','2 루카리오','5 이벨타르'),
            array('1 음뱃','4 솔록','1 식스테일','2 로토무','1 음뱃','2 또가스','1 야돈','2 킬리아'),
            array('4 비리디온','1 메탕','2 나인테일','2 로토무','1 포곰곰','3 케르디오','1 먹고자','3 피카츄'),
            array('3 또도가스','3 잠만보','1 야돈','1 리오르','4 거북왕','1 로토무','3 루카리오','3 음번'),
            array('2 야도란','1 포곰곰','3 메타그로스','2 루카리오','4 메로엣타','4 루카리오','2 음뱃','4 코바르온'),
            array('2 또가스','4 테라키온','4 테라키온','1 포곰곰','4 토네로스','3 돈크로우','1 메탕','4 가디안'),
            array('3 나인테일','5 테오키스','4 리자몽','5 뮤츠','4 음번','2 킬리아','1 식스테일','1 포곰곰'),
            array('2 먹고자','3 가디안','2 날쌩마','3 음번','2 날쌩마','2 로토무','2 날쌩마','1 리오르'),
            array('1 식스테일','2 메탕구','4 거북왕','2 킬리아','4 마나피','5 레지기가스','1 음뱃','2 또가스'),
            array('1 포니타','1 식스테일','2 킬리아','4 케르디오','2 로토무','1 야돈','5 디안시','1 랄토스'),
            array('5 스이쿤','1 야돈','2 킬리아','4 리자몽','3 루나톤','2 로토무','3 날쌩마','3 또도가스'),
            array('3 이븐곰','3 루나톤','1 포곰곰','1 먹고자','3 로토무','3 잠만보','1 포곰곰','3 돈크로우'),
            array('2 나인테일','2 음뱃','1 야돈','3 나인테일','4 비리디온','1 니로우','1 포니타','4 비리디온'),
            array('1 메탕','1 로토무','4 비리디온','3 잠만보','2 나인테일','1 로토무','1 리오르','4 마나피'),
            array('4 음번','2 이븐곰','2 이븐곰','3 야도킹','1 니로우','2 돈크로우','4 거북왕','4 토네로스'),
            array('2 루카리오','1 랄토스','5 라이코','2 날쌩마','3 잠만보','1 랄토스','4 리자몽','5 레지기가스'),
            array('1 리오르','3 케르디오','1 먹고자','1 야돈','1 리오르','4 이상해꽃','2 이븐곰','4 볼트로스')
        );


        foreach($ruch5_data as $key => $val){
            $tan = 20;
            arrayTable::create([
                'tan' => $tan,
                'rows' => $key+1,
                'line_1' => $val[0],
                'line_2' => $val[1],
                'line_3' => $val[2],
                'line_4' => $val[3],
                'line_5' => $val[4],
                'line_6' => $val[5],
                'line_7' => $val[6],
                'line_8' => $val[7],
            ]);
        }

    }

    public function dataout_ruch5()
    {
        $ruch_5 = arrayTable::where('tan','=','20')->orderby('rows','asc')->get();

        return view('arraytable.ruch5',compact('ruch_5'));
    }

    public function dataout_ruch6()
    {
        $ruch_6 = arrayTable::where('tan','=','21')->orderby('rows','asc')->get();

        return view('arraytable.ruch6',compact('ruch_6'));
    }

    public function datain_ruch6()
    {
        $ruch6_data = array(
            array('4 대짱이', '2 마그케인', '1 소미안', '5 프리져', '2 슈륙챙이', '1 바닐프티', '4 불카모스', '3 강챙이'),
            array('4 장크로다일', '4 번치코', '4 메가니움', '2 베이리프', '2 마그케인', '4 레지아이스', '3 맘모꾸리', '4 지가르데'),
            array('2 슈륙챙이', '2 활화르바', '2 슈륙챙이', '1 브케인', '2 만마드', '1 치코리타', '1 브케인', '2 메꾸리'),
            array('3 불카모스', '5 썬더', '1 바닐프티', '4 배바닐라', '4 메가니움', '4 맘모꾸리', '1 메탕', '2 슈륙챙이'),
            array('1 머드나기', '3 더시마사리', '2 자말라', '2 엘풍', '2 메꾸리', '2 마그케인', '1 발챙이', '5 지가르데'),
            array('4 마기아나', '2 바닐리치', '1 꾸꾸리', '2 만마드', '5 기라티나(오)', '1 브케인', '4 가디안', '1 바닐프티'),
            array('1 소미안', '2 메꾸리', '1 소미안', '2 바닐리치', '1 치코리타', '4 히드런', '5 루나아라', '2 킬리아'),
            array('1 바닐프티', '2 메탕구', '5 루기아', '1 메탕', '3 더시마사리', '2 슈륙챙이', '3 가디안', '2 만마드'),
            array('3 가디안', '2 슈륙챙이', '1 리아코', '3 엘풍', '4 지가르데', '2 시마사리', '2 엘풍', '4 번치코'),
            array('1 머드나기', '3 캥카', '1 머드나기', '2 메꾸리', '1 브케인', '1 바닐프티', '2 킬리아', '4 나무킹'),
            array('5 펄기아', '2 마그케인', '3 자말라', '2 엘리게이', '2 킬리아', '4 마기아나', '3 강챙이', '3 더시마사리'),
            array('2 활화르바', '2 엘리게이', '1 머드나기', '1 치코리타', '1 꾸꾸리', '2 활화르바', '1 소미안', '2 메탕구'),
            array('2 베이리프', '2 킬리아', '3 장크로다일', '2 메꾸리', '1 머드나기', '2 자말라', '2 메꾸리', '3 가디안'),
            array('3 쁘사이저', '1 랄토스', '4 캥카', '1 랄토스', '1 메탕', '5 피카츄', '4 나무킹', '2 활화르바'),
            array('5 다크라이', '2 엘리게이', '4 레지아이스', '1 발챙이', '4 캥카', '3 쁘사이저', '4 레지락', '2 엘풍'),
            array('2 시마사리', '3 맘모꾸리', '2 메탕구', '5 기라티나(어)', '4 레지아이스', '3 블레이범', '3 쁘사이저', '2 엘리게이'),
            array('4 레지아이스', '1 발챙이', '2 엘리게이', '3 자말라', '3 블레이범', '3 헤라크로스', '2 마그케인', '1 소미안'),
            array('1 리아코', '1 발챙이', '4 히드런', '4 나무킹', '3 자말라', '1 메탕', '2 슈륙챙이', '2 시마사리'),
            array('3 맘모꾸리', '4 쁘사이저', '2 베이리프', '4 메타그로스', '2 자말라', '1 발챙이', '2 바닐리치', '1 치코리타'),
            array('2 메꾸리', '3 배바닐라', '1 치코리타', '2 시마사리', '2 킬리아', '5 페로코체', '1 꾸꾸리', '1 꾸꾸리'),
            array('2 엘리게이', '5 매시붕', '5 지가르데', '2 자말라', '1 바닐프티', '2 메탕구', '2 엘리게이', '3 메가니움'),
            array('2 메탕구', '2 킬리아', '3 메타그로스', '1 발챙이', '2 슈륙챙이', '4 대짱이', '2 만마드', '1 머드나기'),
            array('2 엘풍', '1 리아코', '1 랄토스', '2 메탕구', '2 엘리게이', '2 베이리프', '2 자말라', '3 만마드'),
            array('1 발챙이', '3 메가니움', '4 번치코', '1 바닐프티', '4 레지스틸', '3 메타그로스', '1 바닐프티', '1 메탕'),
            array('4 레지락', '2 시마사리', '1 브케인', '2 베이리프', '2 엘풍', '2 엘리게이', '3 루카리오', '2 자말라'),
            array('3 메타그로스', '3 불카모스', '4 쁘사이저', '3 헤라크로스', '1 발챙이', '3 가디안', '4 배바닐라', '5 디아루가'),
            array('1 랄토스', '4 가디안', '2 바닐리치', '4 히드런', '4 대짱이', '1 소미안', '4 번치코', '1 꾸꾸리'),
            array('2 시마사리', '1 치코리타', '2 활화르바', '4 블레이범', '5 다크라이', '2 바닐리치', '2 킬리아', '4 메타그로스'),
            array('3 배바닐라', '1 브케인', '2 만마드', '2 슈륙챙이', '1 메탕', '3 루카리오', '4 장크로다일', '1 리아코'),
            array('2 마그케인', '3 장크로다일', '2 엘풍', '1 브케인', '2 활화르바', '4 레지스틸', '4 마기아나', '1 랄토스'),
            array('2 킬리아', '2 만마드', '2 메꾸리', '1 꾸꾸리', '2 바닐리치', '2 킬리아', '3 자말라', '4 레지락'),
            array('4 지가르데', '1 꾸꾸리', '2 메꾸리', '4 불카모스', '3 맘모꾸리', '5 프리져', '4 캥카', '2 만마드'),
            array('1 치코리타', '4 쁘사이저', '1 발챙이', '4 헤라크로스', '1 소미안', '4 불카모스', '3 블레이범', '2 마그케인'),
            array('3 헤라크로스', '4 나무킹', '3 만마드', '3 캥카', '4 마기아나', '3 강챙이', '2 마그케인', '2 바닐리치'),
            array('3 루카리오', '1 치코리타', '4 블레이범', '3 만마드', '2 베이리프', '1 꾸꾸리', '1 랄토스', '4 헤라크로스'),
            array('1 리아코', '2 자말라', '5 썬더', '4 레지스틸', '2 바닐리치', '2 엘풍', '1 브케인', '5 솔가레오'),
            array('1 꾸꾸리', '4 메가니움', '2 킬리아', '3 블레이범', '4 메타그로스', '3 만마드', '1 리아코', '2 베이리프'),
            array('1 메탕', '2 베이리프', '3 헤라크로스', '1 소미안', '1 꾸꾸리', '1 리아코', '5 파이어', '4 맘모꾸리'),
            array('2 활화르바', '1 소미안', '3 캥카', '3 메가니움', '3 루카리오', '3 더시마사리', '2 메탕구', '1 브케인'),
            array('2 바닐리치', '4 헤라크로스', '3 불카모스', '2 활화르바', '3 장크로다일', '4 레지락', '1 머드나기', '2 시마사리'),
            array('4 가디안', '4 히드런', '4 레지스틸', '2 킬리아', '5 파이어', '2 만마드', '2 시마사리', '3 쁘사이저'),
            array('1 랄토스', '1 랄토스', '2 마그케인', '2 마그케인', '1 리아코', '1 랄토스', '3 불카모스', '3 엘풍'),
            array('3 엘풍', '4 블레이범', '2 슈륙챙이', '3 배바닐라', '2 자말라', '2 베이리프', '2 활화르바', '4 가디안'),
            array('4 맘모꾸리', '3 강챙이', '2 자말라', '1 머드나기', '3 캥카', '2 메꾸리', '5 칠색조', '2 메탕구'),
            array('2 자말라', '2 베이리프', '4 지가르데', '1 메탕', '1 랄토스', '1 머드나기', '3 메타그로스', '1 소미안'),
            array('2 활화르바', '1 바닐프티', '3 루카리오', '1 리아코', '2 시마사리', '2 엘풍', '2 엘풍', '1 발챙이'),
            array('5 솔가레오', '1 머드나기', '3 엘풍', '5 루나아라', '3 메가니움', '2 마그케인', '2 만마드', '3 루카리오'),
            array('2 만마드', '2 엘풍', '2 메탕구', '2 슈륙챙이', '1 리아코', '4 배바닐라', '1 치코리타', '3 장크로다일'),
            array('2 메탕구', '1 메탕', '2 시마사리', '2 엘리게이', '3 배바닐라', '2 바닐리치', '1 바닐프티', '2 엘리게이'),
            array('1 브케인', '5 피카츄', '1 메탕', '4 대짱이', '2 메탕구', '1 치코리타', '2 베이리프', '4 장크로다일')
        );

        foreach($ruch6_data as $key => $val){
            $tan = 21;
            arrayTable::create([
                'tan' => $tan,
                'rows' => $key+1,
                'line_1' => $val[0],
                'line_2' => $val[1],
                'line_3' => $val[2],
                'line_4' => $val[3],
                'line_5' => $val[4],
                'line_6' => $val[5],
                'line_7' => $val[6],
                'line_8' => $val[7],
            ]);
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\arrayTable  $arrayTable
     * @return \Illuminate\Http\Response
     */
    public function show(arrayTable $arrayTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\arrayTable  $arrayTable
     * @return \Illuminate\Http\Response
     */
    public function edit(arrayTable $arrayTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\arrayTable  $arrayTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, arrayTable $arrayTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\arrayTable  $arrayTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(arrayTable $arrayTable)
    {
        //
    }
}
