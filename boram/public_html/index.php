<!DOCTYPE html>
	<head>
		<title>보람메딕스 황덕기</title>
	</head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<link rel="stylesheet"  href="/lib/css/boram_page.css"/>
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> <!--팝업창 드래그-->
			<script type="text/javascript" src="/lib/js/jquery-1.9.1.min.js"></script>
			<script type="text/javascript" src="local.js"></script><!--숫자 카운트-->
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> <!--팝업창 드래그-->

 
			 
		  <style type="text/css">
			@font-face {font-family: Nato Sans CJK KR Bold; src: url('/data/font/NotoSans-Bold.otf');}
			@font-face {font-family: Nato Sans CJK KR Medium; src: url('/data/font/NotoSans-Medium.otf');}
			@font-face {font-family: Nato Sans CJK KR Light; src: url('/data/font/NotoSans-Light.otf');}
			@font-face {font-family: Nato Sans CJK KR Regular; src: url('/data/font/NotoSans-Regular.otf');}

			body {
        background:url('/data/boram_bg.png') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover; }  <!--배경이미지 전체 이미지 적용 -->

		  </style> 
		  
		  <script type="text/javascript">		  


<!----------------------------bookmark -------------------------------->  
		 $(document).ready(function() {
       
			$('.bookmark').show(); 
			$('.bookmark_click').hide(); 
		
			$('.bookmark').click(function(){ 
			$ ('.bookmark').hide(); 
			$ ('.bookmark_click').show();
       return false;
     });
			$('.bookmark_click').click(function(){ 
			$ ('.bookmark_click').hide(); 
			$ ('.bookmark').show();
	     return false;
	});
	

		   
  });
<!-----------------------------------bookmark_set------------------------------------->

		 $(document).ready(function() {
       $('.bookmark_set').show(); 
       $('.bookmark_set_click').hide(); 
	   
	   
       $('.bookmark_set').click(function(){ 
       $ ('.bookmark_set').hide(); 
       $ ('.bookmark_set_click').show();
       return false;
     });
	  $('.bookmark_set_click').click(function(){ 
       $ ('.bookmark_set_click').hide(); 
       $ ('.bookmark_set').show();
	     return false;
		   });
  });



 <!------------------------------------클릭하면 팝업창 뜸--------------------------------------->
 var i = 0;
 function showmap() { 
	 if(document.all.spot.style.display=="none") {
		document.all.spot.style.display="block";
			if( i == 0){																						<!--스크롤 최하단 위치시키기 -->
				var elmnt = document.getElementById("c_middle");
				var y = elmnt.scrollHeight;
				elmnt.scrollTop = y;
				i++;
			}																									<!--------------------------------->
			return false;				
 }
 <!--X눌러서 닫기-->
 if(document.all.spot.style.display=="block") {
  document.all.spot.style.display="none";
  return false;
 }
}
<!---------------------------팝업드래그 (레이어팝업)--------------------------->

$( function() {

	$( "#spot" ).draggable({
	handle: "#c_top" <!--이동시킬때 클릭할 영역-->
});

  } );
  
  <!---------------------------클릭하면 팝업창 뜸 (제품상세페이지)--------------------------->
  
  function doPopupopen() {
   window. open("popup. html", "popup01", "width=300, height=360");
}
  
  <!---------------------------bottom클릭하면 바뀜--------------------------->
  
		  $(document).ready(function() {
		$('.bottom').show(); //페이지를 로드할 때 표시할 요소
		$('.bottom_2').hide(); //페이지를 로드할 때 숨길 요소

		$('.complete_order_button').click(function(){
		$ ('.bottom').hide(); //클릭 시 첫 번째 요소 숨김
		$ ('.bottom_2').show(); //클릭 시 두 번째 요소 표시
		return false;
		});

		$('.complete_order_button_2').click(function(){
		$ ('.bottom_2').hide();
		$ ('.bottom').show();
		return false;
		});
		}); 
  
 
		  </script>

	<body> 
		<div class="page_all">
			<div class="boram_page">
				<div class="top"> 
					<a href="/index.php"> <div class="boram_logo"></div></a>
						<span class="DG"></span>
						<a href="#" onClick="showmap(spot);"><div class="inquire_button">1:1 문의</div></a>	
						<span class="log_out"><a href="/module/boram_login.php">로그아웃</a></span>
						<span class="account">입금계좌 : 대구은행 - 50810 43 69928</span>
				</div>
				<div class="left">
					<div class="list"> <!--좌측 목록-->
							<table class="list_borad">
													<tr class="th">
														<td class="th_a">영양제</td>
													</tr>
													<tr class="tr">
														<td><a href="#">종합 영양제</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">간영양제</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">잇못질환영양제</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">혈액순환영양제</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">뼈,관절영양제</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">눈영양제</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">어린이영양제</a></td>
													</tr>
													<tr class="tr_end">
														<td><a href="#">기타영양제</a></td>
													</tr>
<!---------------------------------------------------------------------------------------------------------------------------------------->													
													<tr class="th">
														<td class="th_a">감기약류</td>
													</tr>
													<tr class="tr">
														<td><a href="#">종합감기약</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">기침감기약</a></td>
													</tr>
													<tr class="tr_end">
														<td><a href="#">콧물,비염감기약</a></td>
													</tr>
<!---------------------------------------------------------------------------------------------------------------------------------------->
													<tr class="th">
														<td class="th_a">해열,진통,소염</td>
													</tr>
													<tr class="tr">
														<td><a href="#">해열진통제</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">소염,진통제</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">근이완제</a></td>
													</tr>
													<tr class="tr_end">
														<td><a href="#">시럽제</a></td>
													</tr>
<!---------------------------------------------------------------------------------------------------------------------------------------->
													<tr class="th">
														<td class="th_a">위장약</td>
													</tr>
													<tr class="tr">
														<td><a href="#">위궤양 및 제산제</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">소화제</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">정장,지사제</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">변비 치료제</a></td>
													</tr>
													<tr class="tr_end">
														<td><a href="#">멀미약</a></td>
													</tr>
<!---------------------------------------------------------------------------------------------------------------------------------------->
													<tr class="th">
														<td class="th_a">안약,연고류</td>
													</tr>
													<tr class="tr">
														<td><a href="#">인공누액</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">안약류</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">무좀,피부질환 연고</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">외상,소염진통 연고</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">기타연고</a></td>
													</tr>
													<tr class="tr_end">
														<td><a href="#">벌레연고</a></td>
													</tr>
<!---------------------------------------------------------------------------------------------------------------------------------------->
													<tr class="th">
														<td class="th_a">기타</td>
													</tr>
													<tr class="tr">
														<td><a href="#">피로회복제</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">파스류</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">기타의약품</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">건강기능식품</a></td>
													</tr>
													<tr class="tr_end">
														<td><a href="#">한방OTC</a></td>
													</tr>
<!---------------------------------------------------------------------------------------------------------------------------------------->
													<tr class="th">
														<td class="th_a">의약부외품</td>
													</tr>
													<tr class="tr">
														<td><a href="#">의약부외</a></td>
													</tr>
													<tr class="tr">
														<td><a href="#">어린이 건강식품</a></td>
													</tr>
													<tr class="tr_end">
														<td><a href="#">기타 어린이용품</a></td>
								</table>
					</div>
				</div>
				<div class="right"> 
					<!--<div class="list"> </div>-->
					<a href="#"><div class="bookmark_set"> </div>
										<div class="bookmark_set_click"> </div>
					
					</a>
					<div class="product_search_location">
							<input type="text" name="search"/>
							<a href="#"> <div class="search_icon"> </div></a>
					</div>
					<div class="product_location">
						<div class="product">
							<div class="product_picture"></div>
							<div class="product_name">
								<span onclick="window.open('/content/boram_product_view.jsp','popup01','width=518,height=700,location=no,status=no,scrollbars=no');">
								제품이름</span>
							</div>
							<div class="product_price">1200</div>
							<div class="product_quantity_1">수량 </div>
							<div class="product_quantity_2">
								<input name="num" class="num" type="number" value="0" min="0" max="100" onKeyup="this.value=this.value.replace(/[^0-9]/g,'');"  />
							</div>
							<div class="product_quantity_3">
								<div class="input-number-group">
									<div name="count_up" class="count_up"></div>
								</div>
								<div class="input-number-group">
									<div name="count_down" class="count_down"></div>
								</div>
							</div> <!--number 화살표-->
								<a href="#">
								<div class="bookmark" name="bookmark"></div>
								<div class="bookmark_click" name="bookmark_click"></div>
								</a>
							

							<a href="#"><div class="buy_button"></div> </a>
						</div>
						
						<div class="product">
						<div class="product_picture"></div>
							<div class="product_name"><a href="/content/boram_product_view.jsp">제품 이름</a></div>
							<div class="product_price">1200</div>
							<div class="product_quantity_1">수량 </div>
							<div class="product_quantity_2">
								<input name="num" class="num" type="number" value="0" min="0" max="100" onKeyup="this.value=this.value.replace(/[^0-9]/g,'');"  />
							</div>
							<div class="product_quantity_3">
								<div class="input-number-group">
									<div name="count_up" class="count_up"></div>
								</div>
								<div class="input-number-group">
									<div name="count_down" class="count_down"></div>
								</div>
							</div> <!--number 화살표-->
								<a href="#">
								<div class="bookmark" name="bookmark"></div>
								<div class="bookmark_click" name="bookmark_click"></div>
								</a>
							

							<a href="#"><div class="buy_button"></div> </a>
						</div>
						
						<div class="product">
						<div class="product_picture"></div>
							<div class="product_name"><a href="/content/boram_product_view.jsp">제품 이름</a></div>
							<div class="product_price">1200</div>
							<div class="product_quantity_1">수량 </div>
							<div class="product_quantity_2">
								<input name="num" class="num" type="number" value="0" min="0" max="100" onKeyup="this.value=this.value.replace(/[^0-9]/g,'');"  />
							</div>
							<div class="product_quantity_3">
								<div class="input-number-group">
									<div name="count_up" class="count_up"></div>
								</div>
								<div class="input-number-group">
									<div name="count_down" class="count_down"></div>
								</div>
							</div> <!--number 화살표-->
								<a href="#">
								<div class="bookmark" name="bookmark"></div>
								<div class="bookmark_click" name="bookmark_click"></div>
								</a>
							

							<a href="#"><div class="buy_button"></div> </a>
						</div>

						<div class="product">
						<div class="product_picture"></div>
							<div class="product_name"><a href="/content/boram_product_view.jsp">제품 이름</a></div>
							<div class="product_price">1200</div>
							<div class="product_quantity_1">수량 </div>
							<div class="product_quantity_2">
								<input name="num" class="num" type="number" value="0" min="0" max="100" onKeyup="this.value=this.value.replace(/[^0-9]/g,'');"  />
							</div>
							<div class="product_quantity_3">
								<div class="input-number-group">
									<div name="count_up" class="count_up"></div>
								</div>
								<div class="input-number-group">
									<div name="count_down" class="count_down"></div>
								</div>
							</div> <!--number 화살표-->
								<a href="#">
								<div class="bookmark" name="bookmark"></div>
								<div class="bookmark_click" name="bookmark_click"></div>
								</a>
							

							<a href="#"><div class="buy_button"></div> </a>
						</div>
						
						<div class="product">
						<div class="product_picture"></div>
							<div class="product_name"><a href="/content/boram_product_view.jsp">제품 이름</a></div>
							<div class="product_price">1200</div>
							<div class="product_quantity_1">수량 </div>
							<div class="product_quantity_2">
								<input name="num" class="num" type="number" value="0" min="0" max="100" onKeyup="this.value=this.value.replace(/[^0-9]/g,'');"  />
							</div>
							<div class="product_quantity_3">
								<div class="input-number-group">
									<div name="count_up" class="count_up"></div>
								</div>
								<div class="input-number-group">
									<div name="count_down" class="count_down"></div>
								</div>
							</div> <!--number 화살표-->
								<a href="#">
								<div class="bookmark" name="bookmark"></div>
								<div class="bookmark_click" name="bookmark_click"></div>
								</a>
							

							<a href="#"><div class="buy_button"></div> </a>
						</div>
						
					</div>
				</div>
				
				
				
				<div class="bottom">
					<div class="bottom_button_location">	 <!--주문상태 버튼 영역-->
						<div class="breakdown_top_button"> <!--주문상태 버튼-->
							주문상태
						</div>
						<div class="complete_order_button"> <!--주문 완료 버튼-->
							구매내역
						</div>
					</div>
					<div class="b_blank">	<!--회색 여백10px-->
					</div>
					<div class="breakdown">	<!--주문상태 창-->
						<div class="breakdown_table_location"> <!--주문상태 표 영역-->
						
							<table class="b_product_data"> <!--주문상태 표-->
						
							<tr class="b_tr_01">
								<td class="b_td_01">2019.09.04</td> <!--날짜-->
								<td class="b_td_02">제품이름</td> <!--제품이름-->
								<td class="b_td_03">2700</td> <!--약국가-->
								<td class="b_td_04">120</td> <!--갯수-->
								<td class="b_td_05"><div class="b_close_button"><!--지우기 버튼-->
																	<div class="b_close_button_x"></div>
																</div>
								</td>
							</tr>
							
							<tr class="b_tr_02">
								<td class="b_td_01">2019.09.04</td>
								<td class="b_td_02">제품이름</td>
								<td class="b_td_03">2700</td>
								<td class="b_td_04">120</td>
								<td class="b_td_05"><div class="b_close_button">
																	<div class="b_close_button_x"></div>
																</div>
								</td>
							</tr>
							
							<tr class="b_tr_01">
								<td class="b_td_01">2019.09.04</td>
								<td class="b_td_02">제품이름</td>
								<td class="b_td_03">2700</td>
								<td class="b_td_04">120</td>
								<td class="b_td_05"><div class="b_close_button">
																	<div class="b_close_button_x"></div>
																</div>
								</td>
							</tr>
							
							<tr class="b_tr_02">
								<td class="b_td_01">2019.09.04</td>
								<td class="b_td_02">제품이름</td>
								<td class="b_td_03">2700</td>
								<td class="b_td_04">120</td>
								<td class="b_td_05"><div class="b_close_button">
																	<div class="b_close_button_x"></div>
																</div>
								</td>
							</tr>
							
							<tr class="b_tr_01">
								<td class="b_td_01">2019.09.04</td>
								<td class="b_td_02">제품이름</td>
								<td class="b_td_03">2700</td>
								<td class="b_td_04">120</td>
								<td class="b_td_05"><div class="b_close_button">
																	<div class="b_close_button_x"></div>
																</div>
								</td>
							</tr>
							
							<tr class="b_tr_02">
								<td class="b_td_01">2019.09.04</td>
								<td class="b_td_02">제품이름</td>
								<td class="b_td_03">2700</td>
								<td class="b_td_04">120</td>
								<td class="b_td_05"><div class="b_close_button">
																	<div class="b_close_button_x"></div>
																</div>
								</td>
							</tr>
							
						</table>
						
					</div>
					
					<div class="final_price">	<!--최종 가격-->
						250,000
					</div>
					
					<div class="final_buy_button">	<!--결제 버튼-->
					</div>
					
				</div>
				
			</div>
			
			
			<!---------------------------------------------------->
			<div class="bottom_2">
				<div class="bottom_button_location">	 <!--구매내역 버튼 영역-->
							
							<div class="complete_order_button_2"> <!--주문상태 버튼-->
								주문상태
							</div>
							<div class="breakdown_top_button"> <!--구매내역 버튼-->
								구매내역
							</div>
						</div>
						<div class="b_blank">	<!--회색 여백10px-->
						</div>
						<div class="breakdown">	<!--주문상태 창-->
							<div class="deposit_1">	<!--입금대기-->
								입금 대기
							</div>
							<div class="deposit_2">	<!--입금완료-->
								입금 완료
							</div>
							<div class="deliver">	<!--배송중-->
								배송중
							</div>
						</div>
					
				</div>
			</div>
			<!---------------------------------------------------->
			
			
			
			
		</div>
			<div name="spot" id="spot" class="spot" style="position:absolute; top:10px; left:400px; display:none;">	
								<?php include "module/chat/boram_chat.php"; ?>
			</div>
						
	</body>

</html>