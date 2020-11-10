<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="/img/logo.ico">
	<link rel="stylesheet" href="/fontawesome/css/all.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/home.css">
	<link rel="stylesheet" href="/css/profile.css">
	<script src="/js/jquery-3.3.1.js"></script>
	<script src="/js/script.js"></script>
	<title>LINK U</title>
</head>
<body>

<!-- 
USER-DB
1. 인덱스
2. 아이디
3. 닉네임
4. 비밀번호
5. 생년월일
6. 성별
7. 속해있는 밴드
8. 구독중인 페이지
9. 프로필사진


로그인 전 메인 화면 
1. 로그인
2. 회원가입
3. 사이트소개

로그인 후 메인 화면

헤더
1. 밴드,페이지,게시글 검색
2. 새글피드
3. 찾기
4. 알림
5. 채팅
6. 내정보

새글피드
1. 내밴드 목록
2. 밴드 모든 글

찾기(나중에)

각 밴드별 화면
1. 밴드설정
2. 전체글(기본) -글/#태그/@작성자 검색 -새소식 남기기 -글보기
3. 사진첩 -전체사진 -앨범별 보기(4개사진 대표)
4. 일정관리 -클릭하면 등록 -밑에 일정모두보기
5. 멤버 -멤버검색 -모두보기 -초대하기


밴드 설정
1. 밴드종류(비공개, 밴드명 공개, 공개)
2. 대표사진
3. 밴드이름
4. 방장
5. 회원
6. 사진 관리
7. 밴드 안 프로필(이름/사진/상메)

페이지(나중에)
-->

<!-- sns -->
<!-- 
	1. 내 피드

	메인화면
	1. 내 밴드
	2. 타임라인(페북)

	밴드별 화면

	인원별화면
	1. 프로필
	2. 정보
	3. 친구
	4. 사진
	5. 보관함
	
	6. 소개글
	7. 대표콘텐츠
	8. 사진, 친구 9개씩 보기

	1) 친구추가
	2) 친구별(내) 화면
	3) 친구요청 탭
 -->

<?php if(isset($_SESSION['user'])) : ?>

	<!-- 로그인 후 홈 헤더 -->
	<div id="header">
		<div class="size">

			<!-- 로고 -->
			<a href="/home">
				<img src="./img/logo.png" alt="logo">
				LINK U
			</a>

			<!-- 검색창 -->
			<div class="search-box">
				<input type="text" placeholder="밴드, 페이지, 게시글 검색">
				<button><i class="fas fa-search"></i></button>
			</div>

			<!-- 오른쪽 메뉴 -->
			<div id="header-menu">
				<div><a href="/home">내 피드</a></div>
				<div><i class="fas fa-bell"></i></div>
				<div><i class="fas fa-comment-dots"></i></div>
				<div class="profile-menu-top">
					<img src="<?= $user->img ?>" alt="profile" class="profile-img">

					<ul id="profile-menu" class="profile-menu">
						<li><a href="/profile">내 정보</a></li>
						<li><a href="/logout">로그아웃</a></li>
					</ul>
				</div>
			</div>

		</div>
	</div>

	<script>
		
		$('html').on("click", (e)=>{
			if(!$(e.target).hasClass('profile-img') && !$(e.target).hasClass('profile-menu')){
				if($("#profile-menu").hasClass('db')){
					$("#profile-menu").removeClass("db");
				}
			}
		});

		
		$(".profile-img").on("click", ()=>{
			if($("#profile-menu").hasClass('db')){
				$("#profile-menu").removeClass("db");
			}else {
				$("#profile-menu").addClass("db");
			}
		});
		
	</script>

<?php else : ?>

	<!-- 로그인 전 메인 헤더 -->
	<header>
		<div class="size">
			<a href="/">
				<img src="/img/logo.png" alt="logo">
				LINK U
			</a>

			<div class="right-menu">
				<ul id="main-menu">
					<li class="home">HOME<span></span></li>
					<li class="about">ABOUT US<span></span></li>
					<li class="services">SERVICES<span></span></li>
					<li class="pages">PAGES<span></span></li>
					<li class="register">REGISTER<span></span></li>
				</ul>
				<button class="login">LOGIN</button>
			</div>
		</div>
	</header>

<?php endif; ?>