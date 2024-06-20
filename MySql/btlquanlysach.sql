-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 16, 2023 lúc 02:16 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btlquanlysach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `IdAd` int(10) NOT NULL,
  `NameAdmin` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `pass` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`IdAd`, `NameAdmin`, `Email`, `pass`) VALUES
(4, 'Tống Công Tú', 'Tuyentongvan3@gmail.com', '$2y$10$YljodLfiOntVaxaXmDHhx.ktWBpVpI3pn7ayHy.opgc0cIXrq8jCu'),
(5, 'admin', 'admin@admin.com', '$2y$10$raQv4GRIAX8y47AVVUdZ..YwMWNQWDAMxwO1ySwfb2AlgpnX0wli6'),
(6, 'Nam', 'namljm02@gmail.com', '$2y$10$04ks1miGmh2grAQsrlJpQu5bebnYBALAs6zBwSo.ylPhV53HvogW2'),
(7, 'Nam', 'namljm@gmail.com', '$2y$10$JXM1foD/Q4V/MR8wVXanYOISpVUvw6yGomIe0QZktXuoFs.mG2DCm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `IdBook` int(10) NOT NULL,
  `Namebook` text COLLATE utf8_unicode_ci NOT NULL,
  `Img` text COLLATE utf8_unicode_ci NOT NULL,
  `TheLoai` text COLLATE utf8_unicode_ci NOT NULL,
  `TacGia` text COLLATE utf8_unicode_ci NOT NULL,
  `Soluong` int(10) NOT NULL,
  `Gia` int(10) NOT NULL,
  `Ngaydang` date NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`IdBook`, `Namebook`, `Img`, `TheLoai`, `TacGia`, `Soluong`, `Gia`, `Ngaydang`, `noidung`) VALUES
(3, 'Ông già và biển cả', 'onggiavabienca.jpg', 'Tiểu thuyết', 'Ernest Hemingway', 38, 250000, '0000-00-00', 'Ông già và biển cả là minh chứng cho lối viết “tảng băng trôi\" của Hemingway, tức lời văn ít nhưng nhiều tầng lớp ý nghĩa sâu sắc.Câu chuyện kể về ông lão đánh cá Santigo cố gắng đánh nhau ba ngày ba đêm cùng một con cá kiếm khổng lồ trên vùng biển Giếng Lớn. Cuối cùng ông cũng chiến thắng và đem nó trở về đất liền nhưng lại bị đàn cá mập trên biển rỉa hết. Câu chuyện tưởng như đơn giản nhưng được Hermingway sử dụng thành công nguyên lý “tảng băng trôi\" để gài gắm nhiều bài học ý nghĩa.'),
(4, 'Tội ác và trừng phạt', 'toiacvatrungphat.jpg', 'Tiểu thuyết', 'Fyodor Mikhailovich Dostoevsky', 29, 200000, '2023-11-04', 'Chuyện kể về chàng sinh viên nghèo Raxkônnikốp. Vì cuộc sống bị đẩy đến túng quẫn chàng đã ra tay giết hại hai chị em bà lão cầm đồ. Từ đó, cuộc sống của Raxkônnikốp chìm trong u ám, tuyệt vọng, bế tắc vì phải che giấu tội ác mà mình gây ra. Mặc dù không bị trừng trị thể xác nhưng chính tâm hồn chàng đang bị giày vò và héo mòn từng ngày. Bên cạnh chàng luôn có những người bạn cao quý, nhân hậu và bao dung như nàng Xônya. Nhờ sự quan tâm, giúp đỡ của mọi người xung quanh, chàng dần cảm nhận được hơi ấm tình người cao đẹp và quyết tâm ra đầu thú.'),
(5, 'Sherlock Homles', 'Sherlock Homles.jpg', 'Tiểu thuyết', 'Authur Conan Doyle', 39, 250000, '2022-11-08', 'Sherlock Homles là câu chuyện xoay quanh vị thám tử cùng tên nổi tiếng với tài phá án thần kì, trí nhớ xuất sắc và sự phán đoán sắc bén. Truyện được kể lại qua lời của bác sĩ Watson - trợ lý của thám tử Sherlock Homles. Truyện gồm nhiều phần, mỗi phần là một vụ án mà cả hai đã tham gia.'),
(6, 'Carol', 'carol.jpg', 'Tiểu thuyết', 'Patricia Highsmith', 40, 300000, '2022-11-01', 'Carol là cuốn tiểu thuyết hay nên đọc về tình yêu đồng tính. Đó giống như một lời tuyên bố với thế giới về sức lan rộng và quyền bình đẳng của giới LGBT. Trên hết, đó là câu chuyện về một nước Mỹ những năm 50 - xa hoa, thân thiện và đáng mến. Dẫu vậy, người ta vẫn không thể bao dung cho những mối tình đồng tính. Nhưng đi ngược với kết thúc buồn thảm, bi thương, Carol mang đến cái kết tràn đầy hi vọng cho các cặp đôi đồng tình nữ'),
(7, 'Đề thi đẫm máu', 'dethidammau.jpg', 'Tiểu thuyết', 'Lôi Mễ', 42, 200000, '2023-08-07', 'Phương Mộc là sinh viên chuyên ngành Pháp lý đại học J. Trong lớp, Phương Mộc vốn là nam sinh trầm ổn, nhạt nhoà nhưng thành tích học tập tương đối xuất sắc. Một sự kiện giết người hàng loạt gây chấn động thành phố lúc bấy giờ xảy ra. Khi cảnh sát còn đang lâm vào bế tắc, chàng sinh viên Phương Mộc đã ra tay chỉ điểm, giúp đỡ cảnh sát truy bắt hung thủ. Nhưng từ đấy, xung quanh Phương Mộc xảy ra nhiều vụ án liên tiếp với những cái chết vô cùng thương tâm. Phải chăng, có ai đó trong bóng tối đang thách thức khả năng của anh?'),
(8, 'Âm thanh và cuồng nộ', 'amthanhvacuongno.jpg', 'Tiểu thuyết', 'William Faulkner', 32, 150000, '2023-08-03', 'Truyện mở ra một thế giới âm u, náo động, hàng chục trang không có lấy một dấu chấm, những ẩn dụ rắc rối bí hiểm nhưng chính là nét phong cách độc đáo của ông. Với Faulkner, tác phẩm sẽ không theo lối viết thông thường mà buộc độc giả phải đọc chậm rãi, suy tư và ngâm cứu kĩ càng.Câu chuyện xoay quanh gia đình Compson - đó là một gia tộc từng một thời giàu có, quyền quý trong vùng Missississipi. Truyện kể lại tấn thảm kịch gia đình sụp đổ, tan vỡ.'),
(9, 'Báu vật của đời', 'bauvatcuadoi.jpg', 'Tiểu thuyết', 'Mạc Ngôn', 23, 250000, '2023-01-17', 'Báu vật ở đời là tác phẩm khái quát trọn vẹn một thời kì lịch sử Trung Quốc, những chuyển biến xã hội sâu sắc và những nét văn hoá rất riêng của Trung Quốc. Đây là một tác phẩm chứa đựng nhiều ý nghĩa to lớn.Báu vật ở đời xoay quanh các thế hệ trong gia đình nhà Thượng Quan, nổi bật nhất là cuộc đời của người phụ nữ Thượng Quan Lỗ Thị gắn liền với đau thương, thăng trầm và lịch sử phát triển của Trung Quốc.'),
(10, 'Nữ sinh', 'nusinh.jpg', 'Tiểu thuyết', 'Dazai Osamu', 34, 200000, '2023-11-07', 'Nữ sinh là một cuốn sách vô cùng thích hợp đọc để tìm hiểu về văn hoá và con người Nhật Bản.Truyện chia ra thành nhiều chương nhỏ, mỗi chương là câu chuyện về một nhân vật khác nhau nhưng tất cả bọn họ đều là những nữ sinh Nhật Bản. Ở họ có chung nét tính cách của người phụ nữ xứ Phù Tang: dịu dàng, khép kín và bền bỉ.'),
(11, 'Lĩnh Nam chích quái', 'lunamchichquai.jpg', 'Tiểu thuyết', 'Nguyễn Hữu Vinh', 34, 250000, '2023-11-07', 'Đây là bản truyện cổ gồm 22 thần thoại, truyền thuyết, sự tích xuyên suốt lịch sử hình thành và xây dựng nước Việt Nam. Lĩnh Nam chích quái đã thể hiện sự sáng tạo phong phú của các tác giả Việt, những câu chuyện về văn hoá, tôn giáo, tín ngưỡng của người Việt. Truyện có ý nghĩa quan trọng trong việc xây dựng ý thức quốc gia dân tộc Việt, tấm gương phản chiếu đời sống tinh thần phong phú của người Việt cổ, sự giao lưu văn hoá với các nước bạn như Trung Quốc, Chiêm Thành…Lĩnh Nam chích quái là cuốn sách cần phải đọc cho những ai muốn tìm hiểu về văn hoá nước Việt.'),
(12, 'Chạy đua với Robot', 'chayduarobot.jpg', 'Khoa học công nghệ', 'Joseph E.Aoun', 65, 300000, '2023-11-07', 'Sự sáng tạo kết hợp với sự linh hoạt trí tuệ khiến chúng ta trở nên đặc biệt và trở thành sinh vật thành công nhất trên hành tinh này. Chúng sẽ tiếp tục là phương cách để mỗi cá nhân tạo nên dấu ấn riêng trong nền kinh tế. Dù trong lĩnh vực hay ngành nghề nào, công việc quan trọng nhất mà con người thực hiện sẽ luôn là công việc sáng tạo. Đó là lý do tại sao hệ thống giáo dục nên dạy chúng ta cách sáng tạo hiệu quả.'),
(13, 'Con người trong kỷ nguyên trí tuệ nhân tạo', 'AI.jpg', 'Khoa học công nghệ', 'Max Tegmark', 53, 300000, '2023-11-07', 'Trí tuệ nhân tạo ảnh hưởng như thế nào đến công ăn việc làm, tội phạm, chiến tranh và mọi mặt của đời sống con người?\r\nLoài người có thể làm gì để phát triển thịnh vượng nhờ tự động hóa mà không rơi vào nghèo khó và sống thiếu mục đích?\r\nLiệu cuối cùng máy móc có vượt qua cả trí tuệ nhân loại để thay thế hoàn toàn con người?\r\nCuốn sách này sẽ dẫn dắt bạn qua những câu hỏi lớn kể trên, để cuối cùng đến với vấn đề quan trọng bậc nhất của thời đại ngày nay: BẠN MUỐN TƯƠNG LAI CỦA CHÚNG TA NHƯ THẾ NÀO?'),
(14, 'Cuộc cách mạng AI', '23050.jpg', 'Khoa học công nghệ', 'Brett King', 36, 250000, '2023-11-07', 'Cuộc cách mạng AI của tác giả Brett King sẽ cho chúng ta một cái nhìn tổng quan về những thay đổi công nghệ trong những năm gần đây và phần nào rút ra những bài học cần thiết để có thể hướng đến tương lai mà không bị tương lai đó nhấn chìm.'),
(15, '6 phát minh làm nên thời đại', '18692.jpg', 'Khoa học công nghệ', 'Steven Johnson', 33, 200000, '2023-11-07', '6 phát minh làm nên thời đại là một cuốn sách ngắn, khá dễ đọc, thú vị và đầy thách thức với những điều kỳ diệu mỗi ngày quanh ta.'),
(16, 'Cuộc cách mạng công nghiệp lần III', '21256.jpg', 'Khoa học công nghệ', 'Jeremy Rifkin', 32, 200000, '2023-11-07', 'Cuốn Cuộc cách mạng công nghiệp lần III này sẽ cung cấp cho chúng ta những phân tích về thực trạng hiện nay của môi trường cũng như sự tồn vong của Trái Đất. Thông quá đó, chúng ta sẽ biết được vai trò tất yếu của việc phát dộng một cuộc cách mạng mới. Một cuộc cách mạng trong đó, mọi người đều có thể tự tạo ra những nhà máy phát điện mini tại nhà hoặc tại cơ quan bằng việc sử dụng những nguồn năng lượng tái tạo - từ nguồn năng lượng thiên nhiên vô hạn như nước, gió, và mặt trời... '),
(17, 'Những người tiên phong', '18326.jpg', 'Khoa học công nghệ', 'Walter Isaacson', 44, 300000, '2023-11-07', 'Dưới ngòi bút tài hoa đã được cả thế giới công nhận của Isaacson, những câu chuyện hiện lên sống động, chân thực và gần gũi. Những chi tiết được chọn lọc đắt giá để lột tả được chân dung nhân vật trong một vài khung hình chớp nhoáng. Có thể nói, hiếm có cuốn sách nào về kỹ thuật và công nghệ lại được viết một cách dễ hiểu và nên thơ đến như vậy.'),
(18, 'Những gã khổng lồ công nghệ Trung Quốc', '33296.jpg', 'Khoa học công nghệ', 'A.Fannin', 23, 150000, '2023-11-07', 'Tác giả phân tích và chỉ ra chiến lược đầu tư của Trung Quốc vào các thị trường mới nổi như Ấn Độ, Đông Nam Á nhằm giành miếng bánh thị phần lớn trong mảng công nghệ, đây vừa là lợi thế cho Việt Nam cũng vừa là thách thức không nhỏ đối với một quốc gia đang bắt đầu con đường phát triển và đổi mới công nghệ.'),
(19, 'Đạo của vật lý', '15012.jpg', 'Khoa học công nghệ', 'Fritjof Capra', 32, 150000, '2023-11-07', 'Cuốn sách này của Capra giúp người đọc có một cái nhìn tổng thể về những thành tựu của vật lý học, về những vấn đề lớn hiện nay làm cho vật lý bị giam trong một cuộc khủng hoảng về nhận thức luận và về những sự tương đồng nổi bật với các triết lý phương Đông.'),
(20, 'Chiếc thìa biến mất', '33461.jpg', 'Khoa học công nghệ', 'Sam Kean', 43, 200000, '2023-11-07', 'Năm 1939*, các nhà khoa học Đức và Mỹ đã chứng minh rằng Mặt Trời và các ngôi sao khác tự gia nhiệt bằng cách hợp hạch hydro thành heli, giải phóng nguồn năng lượng khổng lồ, bất chấp kích thước cực nhỏ của nguyên tử. Một số nhà khoa học đồng ý rằng dân số hydro và heli có thay đổi (dù rất ít), nhưng không có bằng chứng nào cho thấy dân số của các nguyên tố khác thay đổi cả. Khi kính thiên văn ngày càng được cải thiện, nhiều khúc mắc cũng xuất hiện theo. Về lý thuyết, Vụ nổ Lớn phải giảiphóng các nguyên tố đồng đều theo mọi hướng. Nhưng dữ liệu đã chứng minh rằng hầu hết các ngôi sao trẻ chỉ chứa hydro và heli, còn các ngôi sao già hơn lại chứa hàng tá nguyên tố. Thêm vào đó, các nguyên tố cực kỳ kém bền như tecneti không xuất hiện trên Trái Đất nhưng lại tồn tại trong một số “ngôi sao đặc biệt về mặt hóa học”. Phải có thứ gì đó đang liên tục tạo ra các nguyên tố mỗi ngày.'),
(21, 'Cẩm nang Scrum cho người mới bắt đầu', '18990.jpg', 'Khoa học công nghệ', 'Học viện Agile', 26, 200000, '2023-11-07', 'Nhóm tác giả Học viện Agile hân hạnh đồng hành cùng các bạn học Agile, thực hành Agile để kiến tạo những giá trị mới, tạo những đổi thay tích cực. Thông qua việc biên soạn cuốn sách Cẩm nang Scrum cho người mới bắt đầu này, chúng tôi mong muốn mang đến cho bạn cơ hội học hỏi, thực hành Agile với chất lượng cao và hiệu quả tốt. Dù rất nỗ lực, cuốn sách chắc chắn không khỏi mắc phạm phải những thiếu sót.'),
(22, 'Đắc nhân tâm', '10990.jpg', 'Kĩ năng', 'Dale Carnegie', 91, 250000, '2023-11-07', 'Đắc nhân tâm của Dale Carnegie là quyển sách nổi tiếng nhất, bán chạy nhất  và có tầm ảnh hưởng nhất của mọi thời đại…Đắc Nhân Tâm là cuốn sách đưa ra các lời khuyên về cách thức cư xử, ứng xử và giao tiếp với mọi người để đạt được thành công trong cuộc sống. Gần 80 năm kể từ khi ra đời, Đắc Nhân Tâm là cuốn sách gối đầu giường của nhiều thế hệ luôn muốn hoàn thiện chính mình để vươn tới một cuộc sống tốt đẹp và thành công.'),
(23, 'Thức dậy muốn đi làm', '33431.jpg', 'Kĩ năng', 'Liz Fosslien', 22, 200000, '2023-11-07', 'Tương lai của công việc nằm ở cảm xúc. Sự nghiệp sẽ rộng mở và cuộc sống sẽ thêm nhiều năng lượng tích cực nếu bạn biết cách lắng nghe, thấu hiểu và thể hiện cảm xúc của chính mình'),
(24, 'Tư duy nhanh và chậm', '2359.jpg', 'Kĩ năng', 'Daniel Kahneman', 43, 250000, '2023-11-07', 'Chúng ta thường tự cho rằng con người là sinh vật có lý trí mạnh mẽ, khi quyết định hay đánh giá vấn đề luôn kĩ lưỡng và lý tính. Nhưng sự thật là, dù bạn có cẩn trọng tới mức nào, thì trong cuộc sống hàng ngày hay trong vấn đề liên quan đến kinh tế, bạn vẫn có những quyết định dựa trên cảm tính chủ quan của mình. Thinking fast and slow, cuốn sách nổi tiếng tổng hợp tất cả nghiên cứu được tiến hành qua nhiều thập kỷ của nhà tâm lý học từng đạt giải Nobel Kinh tế Daniel Kahneman sẽ cho bạn thấy những sư hợp lý và phi lý trong tư duy của chính bạn. Cuốn sách được đánh giá là “kiệt tác” trong việc thay đổi hành vi của con người, Thinking fast and slow đã dành được vô số giải thưởng danh giá, lọt vào Top 11 cuốn sách kinh doanh hấp dẫn nhất năm 2011. Thinking fast and slow dù là cuốn sách có tính hàn lâm cao nhưng vô cùng bổ ích với tất cả mọi người và đặc biệt rất dễ hiểu và vui nhộn.'),
(25, 'Sức mạnh của sự quan tâm', '30573.jpg', 'Kĩ năng', 'Ken Blanchard', 42, 200000, '2023-11-07', 'Sức Mạnh Của Sự Quan Tâm là câu chuyện về cuộc gặp gỡ giữa Nhà môi giới chứng khoán trẻ tuổi đang từng bước leo lên nấc thang sự nghiệp, nhưng đâu đó trong tâm trí anh vẫn cảm thấy mình yếu kém – và Nhà điều hành đáng kính – CEO của một doanh nghiệp lớn mạnh và thành công, người tuyên bố rằng niềm vui lớn nhất đời mình là có khả năng “cho đi”. Nghĩ rằng mình có thể học hỏi được điều gì đó, Nhà môi giới chứng khoán trẻ tuổi đã đến gặp Nhà điều hành đáng kính, và từ đó, quan điểm sống và làm việc của anh hoàn toàn thay đổi. Anh đã học được ý nghĩa của sự cho đi thời gian, công sức, tài năng của mình để hỗ trợ người khác – thứ sẽ mang đến cho anh sự tiến bộ vượt bậc trong công việc lẫn đời sống gia đình.'),
(26, 'Siêu trí tuệ', 'sieutritue.jpg', 'Kĩ năng', 'Nick Bostrom', 66, 200000, '2023-11-09', 'Não bộ của con người sở hữu nhiều năng lực mạnh mẽ mà các loài động vật khác không có được, và những năng lực này đã đưa chúng ta lên vị trí độc tôn. Tuy nhiên, với tốc độ phát triển theo cấp số nhân của khoa học công nghệ, và kèm theo đó là sự xuất hiện của lĩnh vực Trí tuệ nhân tạo (AI), một ngày nào đó, máy móc sẽ sở hữu bộ não ngang tầm, hay thậm chí là mạnh mẽ hơn con người. Khi đó, cuộc sống của chúng ta sẽ bị chi phối bởi trí tuệ máy, giống như cái cách mà chúng ta hiện đang chi phối các loài khác. Vậy, làm thế nào chúng ta có thể kiểm soát được “sự bùng nổ trí tuệ” đó? Với cuốn sách Siêu trí tuệ, tác giả Nick Bostrom sẽ dẫn dắt chúng ta đến gần hơn với đáp án cho câu hỏi này.'),
(27, 'Giáo trình ngôn ngữ học đại cương', '17045.jpg', 'Giáo trình', 'Ferdinand De Saussure', 50, 150000, '2021-11-10', 'Nhà ngôn ngữ học Thụy Sĩ Ferdinand De Saussure mà giới ngôn ngữ học Châu Âu gọi ông là cha đẻ của ngôn ngữ học hiện đại... Ông là người đầu tiên làm cho ngôn ngữ học trở thành một ngành khoa học thực sự, nhờ có được một đối tượng xác minh và một phương pháp luận hiển ngôn.\r\n\r\nÔng cũng là người đầu tiên trong việc xây dựng những nguyên lý cơ bản của trào lưu cải tạo hoàn toàn tiếp cận với khoa học nhân văn; trào lưu cấu trúc luận...'),
(28, 'Cúp C1 Châu Âu - 66 năm lịch sử', 'C1.jpg', 'Giáo trình', 'Nhiều tác giả', 52, 100000, '2021-11-10', 'Champions League – giải đấu quy tụ các ngôi sao hàng đầu thế giới và mang lại giá trị lớn chưa từng có cho những nhà tổ chức. Năm 2006, UEFA chỉ thu về hơn 600 triệu € cho cả mùa giải. Đến năm 2010, con số này đã tăng lên 1 tỷ €. Năm 2016, Champions League vượt qua cột mốc 2 tỷ và theo số liệu thống kê tháng 11-2020, bản quyền giải đấu mang lại cho UEFA tổng cộng 2,82 tỷ € cho mùa giải 2018-19. Với mùa giải 2019-20, hai nhà báo Alex Harvey và Daniel Geey đưa ra tính toán rằng doanh thu của Champions League sẽ là 3,25 tỷ € bất chấp nửa sau rơi vào giai đoạn của dịch Covid-19. Nhưng sự vĩ đại đầy hào nhoáng ấy không được Liên đoàn bóng đá châu Âu chào đón lúc ban đầu …'),
(29, 'Tóm tắt niên biểu lịch sử Việt Nam', 'lsd.jpg', 'Giáo trình', 'Hà Văn Thu', 38, 150000, '2021-11-10', 'đây là một cuốn sách sẽ giúp các bạn dễ dàng hệ thống, kiểm tra cũng như tra cứu một cách dễ dàng và đơn giản.\r\n\r\nChủ tịch Hồ Chí Minh đã từng nói rằng:\r\n\r\nDân ta phải biết sử ta\r\nCho tường gốc tích nước nhà Việt Nam\r\n\r\nMột đất nước đã trải qua biết bao thăng trầm và những sự kiện lịch sử hào hừng, đã ghi dấu ấn của rất nhiều các nhân vật, những anh hùng đã có công lao xây dựng những trang sử hào hùng và chói lọi của dân tộc. Hiểu rõ và tường tận lịch sử chính là một cách để ta nhớ ơn về những người đi trước, để hiểu hơn về nguồn gốc và từ đó rút ra những bài học tương lai cho mình, đó là những điều quý giá mà ai cũng phải học trong cuộc đời.\r\n\r\nBên cạnh đó ra cuốn sách còn giới thiệu một số danh nhân, anh hùng dân tộc và nhân vật lịch sử nổi tiếng, đáng ghi nhớ với những câu chuyện bên lề, để minh họa và hệ thống kiến thức chinh xác hơn.'),
(30, 'Cửa hiệu triết học', '28315.jpg', 'Giáo trình', 'Peter Worley', 30, 150000, '2021-11-10', 'Cửa hiệu triết học thì khác, nó hồi đáp vấn đề triết học đó trong tinh thần trao đổi kiểu triết học Plato. Những câu hỏi được nêu lên thông qua cuộc tranh luận xuất phát từ một câu chuyện hay một kịch bản, một bài thơ hay một hoạt động; nhưng cuộc đối thoại không chỉ được viết ra mà còn dùng để khiến cho người đọc hay lớp học tập trung vào vấn đề rồi tự họ động não suy nghĩ.\r\n\r\nCửa hiệu Triết học là một cửa hàng thực sự của những câu đố và thách thức triết học để phát triển tư duy trong và ngoài lớp học. Triết gia Socrates đã bày ra một kiểu trao đổi hoàn toàn khác, tiền của ông là các ý tưởng. Cửa hiệu sẽ đóng vai trò như Socrates đang nói chuyện với người đọc: có lúc lôi cuốn, khôi hài và hứng khởi; có lúc chọc ngoáy như một kẻ ưa châm chích, khiến chúng ta không yên; cũng có lúc nói lòng vòng phát ngán hay bỏ lửng, nhưng luôn kích thích suy nghĩ của mọi người.'),
(31, 'Tư tưởng Hồ Chí Minh', '12175.jpg', 'Giáo trình', 'Bộ Giao Thông Vận Tải', 39, 100000, '2021-11-10', 'Bất kỳ ai, muốn sống thì phải có bốn điều ăn, mặc, ở, đi lại”, “Giao thông là mạch máu của mọi công việc”. Trong sự nghiệp kháng chiến chống xâm lược, Chủ tịch Hồ Chí Minh chỉ rõ: “Giao thông vận tải là một mặt trận”, “Giao thông vận tải thắng lợi tức là chiến tranh đã thắng lợi phần lớn rồi”. Trong xây dựng hoà bình, Người khẳng định: “Cầu đường là mạch máu của một nước” và nhấn mạnh: “Đời sống xã hội hiện nay phụ thuộc trước hết vào đường giao thông”.'),
(32, 'Nền kinh tế tự do', '30982.jpg', 'Giáo trình', 'Mario McGovern!', 40, 200000, '2021-11-10', '\"Nền kinh tế tự do\" gợi ý cho các doanh nghiệp và cá nhân cách phát triển phù hợp với xu thế thời đại. Thế hệ lao động mới đang tham gia vào nền kinh tế tự do như thế nào? Động cơ của họ, mong muốn của họ khi xây dựng sự nghiệp ra sao? Làm thế nào để tìm kiếm những nhân sự xuất sắc trong kỷ nguyên 4.0? Các cá nhân phải làm gì để phát huy lợi thế của mình?... Tất cả những điều căn bản về xu hướng lao động thời đại số sẽ được giải đáp bởi Marion McGovern - doanh nhân tiên phong của nền kinh tế tự do.'),
(33, 'Big Data – Dữ liệu lớn', '17936.jpg', 'Khoa học công nghệ', 'Bernard Marr', 40, 200000, '2021-11-10', 'Hiện nay, thế giới đang trở nên thông minh hơn. Chúng ta đang theo dõi và lưu trữ dữ liệu về mọi thứ, nên chúng ta có khả năng tiếp cận với nhiều khối dữ liệu lớn. Tuy nhiên, có rất nhiều vấn đề xoay quanh các khối dữ liệu lớn này. Tất cả chúng ta đều cần phải biết nó là gì và hoạt động như thế nào. Nhưng sự hiểu biết cơ bản về lý thuyết liệu có đủ cho bạn để tổ chức một cuộc họp chiến lược không? Điều khiến bạn trở nên khác với phần còn lại là biết cách sử dụng dữ liệu lớn để cải thiện hiệu suất và có được kết quả kinh doanh vững chắc. Cuốn sách Big Data – Dữ liệu lớn sẽ cung cấp cho bạn một sự hiểu biết rõ ràng, kế hoạch chi tiết và từng bước tiếp cận thông qua mô hình SMART: Khởi dầu với chiến lược, Đo lường các chỉ số và dữ liệu, Áp dụng các phương pháp phân tích, Báo cáo kết quả, Biến đổi doanh nghiệp'),
(34, 'Những phương pháp của ngôn ngữ học cấu trúc', '18639.jpg', 'Giáo trình', 'Cao Xuân Hạo', 43, 200000, '2021-11-10', 'Cuốn sách này trình bày những phương pháp được sử dụng trong ngôn ngữ học miêu tả, hay nói cho đúng hơn, là ngôn ngữ học cấu trúc. Như vậy, nó nhằm thảo luận về những thủ pháp mà nhà ngôn ngữ học có thể thực hiện trong quá trình nghiên cứu nhiều hơn là đề ra một lý luận về những cách phân tích cấu trúc tính có thể rút ra từ những cuộc nghiên cứu đó. Các phương pháp nghiên cứu được sắp xếp dưới dạng thức những thao tác phân tích (procedures of analysis) kế tiếp theo nhau mà nhà ngôn ngữ học dùng để xử lí các cứ liệu của mình. Chúng tôi hi vọng rằng lối trình bày các phương pháp dưới dạng thức và theo trình tự từng thao tác có thể góp phần giảm bớt cái ấn tượng ảo thuật và phiền phức thường đi đôi với những cách phân tích ngôn ngữ học tế nhị hơn.'),
(35, '30 phút mỗi ngày để luyện chính tả tiếng Anh', '8010.png', 'Giáo trình', 'Edie Schwager', 40, 150000, '2021-11-10', '30 phút tiếng Anh mỗi ngày (tên gốc: Better English series) là bộ sách giúp người học tiếng Anh tự nâng cao kiến thức mỗi ngày trong 30 phút bằng những bài học và bài tập nhỏ.'),
(36, 'Bí quyết giúp con giỏi tiếng Anh', '13317.jpg', 'Giáo trình', 'Claire Selby', 44, 150000, '2021-11-10', 'Kết thúc cuốn sách, tác giả Claire Selby nhắn nhủ tới các bậc cha mẹ “Bây giờ các bạn có thể thôi lo lắng và hãy bước những bước đầu tiên cùng con bạn vào một cuộc đời tiếp cận dễ dàng với tiếng Anh” vì “ngày nay, tiếng Anh là một trong những món quà giáo dục quan trọng nhất mà bạn có thể trao cho một đứa trẻ”.'),
(37, 'Steve Jobs - Những bí quyết đổi mới và sáng tạo', '2442.jpg', 'Khoa học công nghệ', 'Carmine Gallo', 40, 20000, '2021-11-10', 'Tóm tắt cuốn sách \"Steve Jobs - Những Bí Quyết Đổi Mới Và Sáng Tạo\": Điều làm cho Steve Jobs trở thành một trong những CEO vĩ đại nhất thế hệ mình là sự khác biệt đến điên rồ, là tư duy sáng tạo và đổi mới, chứa đựng trong bất cứ sản phẩm nào ông tạo ra. Ông đã góp phần đưa Apple trở thành một thương hiệu lớn mạnh toàn cầu, với giá trị thị trường lớn nhất nhì nước Mỹ, bởi nền tảng là những nguyên tắc đổi mới tuy giản đơn nhưng lại mang tính cách mạng và tạo nên những thành công đột phá.'),
(38, 'Bí mật marketing trong thị trường high - tech', '2344.jpg', 'Giáo trình', 'Geoffrey A. Moore', 40, 200000, '2021-11-10', 'Geoffrey cho rằng có một “Vực thẳm” ngăn cách giữa hai mảng thị trường sản phẩm công nghệ: thị trường mới nổi và thị trường phổ thông. Sau khi tung ra sản phẩm công nghệ mới, dù có thành công đến cỡ nào, thì việc đầu tiên các công ty công nghệ cần làm là tập trung sức lực và chuyển mình hoàn toàn để thâm nhập vào thị trường phổ thông. Với kinh nghiệm tư vấn cho hàng loạt những công ty công nghệ hàng đầu thế giới như: Apple, Samsung, IBM, Oracle…'),
(39, 'Những điều trường Harvard vẫn không dạy bạn', '4645.jpg', 'Giáo trình', 'Mark Mc Cormack', 40, 200000, '2021-11-10', 'Những điều trường Harvard vẫn không dạy bạn sẽ đem đến cho người đọc những kinh nghiệm thực tế về bán hàng, thương lượng, khởi sự, xây dựng và điều hành một doanh nghiệp, quản lý con người, những điều mà ngay cả trường kinh doanh Harvard cũng không dạy bạn. Đúng như tác giả đã chiêm nghiệm: chúng ta phải ý thức được những gì nhà trường không thể dạy.'),
(40, '100 Side Hustles - Nghề tay trái: 100 ý tưởng kiếm tiền thời bão giá', '30177.jpg', 'Giáo trình', 'Chris Guillebeau', 44, 150000, '2021-11-10', '“NGHỀ TAY TRÁI: 100 cách kiếm tiền thời bão giá” kể về các câu chuyện khởi nghiệp của những con người bình thường. Họ tạo ra các công việc kinh doanh ngoài giờ để kiếm thêm thu nhập, dựa trên các sáng kiến mà hầu như ai cũng có thể thực hiện: trở thành hướng dẫn viên du lịch trong thành phố, người làm kem que, nhiếp ảnh gia sử dụng kim tuyến làm đạo cụ, bán võng cùng bạn bè để hỗ trợ các nền kinh tế địa phươ Qua 100 câu chuyện độc đáo, tác giả có những tác phẩm bán chạy nhất - Chris Guillebeau - đã cung cấp một “cuốn sách ý tưởng” tràn đầy cảm hứng để chính bạn có thể nảy ra ý tưởng lớn cho riêng mình. Những người thuộc nhiều ngành nghề khác nhau - như các giáo viên, các nhân viên văn phòng hay các lập trình viên - đã tìm cách tạo ra nguồn thu nhập mới, có thể là dựa trên sức lực của chính mình, nhờ hợp tác với bạn bè, hoặc lôi kéo cả gia đình cùng tham gia.'),
(41, 'Khởi nghiệp thông minh - Smart up', '13700.jpg', 'Kĩ năng', 'Nguyễn Tuấn Quỳnh', 40, 200000, '2021-11-10', 'uốn sách nêu bật những kiến thức cơ bản mà bất kỳ doanh nhân trẻ nào cũng cần hiểu rõ khi quyết định đầu tư công sức, tiền bạc vào đứa con của mình. Từ những lý do cần tránh khi khởi nghiệp đến các bước chuẩn bị cho khởi nghiệp, từ mô hình Smartup đến cách thoát khỏi công ty sau khởi nghiệp thành công - một trong những nội dung thú vị nhất của quyển sách.\"'),
(42, 'Mã Vân giày vải', '10294.jpg', 'Kĩ năng', 'Lý Tường', 44, 150000, '2021-11-10', 'Không đơn thuần là một cuốn tiểu sử viết về cuộc đời doanh nhân, Mã Vân giày vải còn muốn gửi gắm tinh thần lập nghiệp, dám dấn thân vì lý tưởng và mơ ước từ hình mẫu con người Mã Vân đến các nhà sáng nghiệp, những người đang ấp ủ trong mình những hoài bão lớn lao, đặc biệt là trong lĩnh vực thương mại điện tử.'),
(43, 'Warren Buffett: 10 thương vụ thâu tóm bạc tỷ của huyền thoại đầu tư chứng khoán', '30807.jpg', 'Kĩ năng', 'Glen Arnold', 34, 200000, '2021-11-10', 'Warren Buffett, huyền thoại trong giới đầu tư, biểu tượng của sự khôn ngoan và kiên định trong theo đuổi đầu tư giá trị. Donald Raymond Keough, cố CEO của Tập đoàn nước giải khát nổi tiếng thế giới – Coca- Cola và cũng là người hàng xóm, người bạn lâu năm của Warren Buffett nhận xét về ông như sau: “Ông ấy có những giá trị không bao giờ thay đổi. Câu chuyện của ông ấy không phải về tiền. Đó là về giá trị. Mọi người nên biết về những giá trị của ông ấy.” Đúng vậy, ngoài khối lượng tài sản khổng lồ đưa ông vào top đầu danh sách tỷ phú của Forbes, với một đế chế đầu tư lớn nhất thế giới nắm giữ cổ phần ở hàng loạt công ty tỷ đô, định giá con người Warren Buffett nằm ở những giá trị phi thời gian mà ông để lại cho nhiều thế hệ nhà đầu tư sau này. Đó là lý thuyết đầu tư giá trị ông theo đuổi, triết lý đầu tư ông xây dựng, phương pháp đầu tư ông tuân thủ.'),
(44, 'Phương pháp giáo dục Montessori - Sức thẩm thấu của tâm hồn', '10424.jpg', 'Kĩ năng', 'Maria Montessori', 34, 150000, '2021-11-10', 'Tóm tắt sách Phương Pháp Giáo Dục Montessori - Sức Thẩm Thấu Của Tâm Hồn:\r\n\r\nPhương pháp giáo dục Montessori được đánh giá là phương pháp giáo dục tiên tiến , khoa học và hoàn thiện nhất thế giới hiện nay. Ở Việt Nam ngày càng nhiều các bậc cha mẹ quan tâm, tìm hiểu phương pháp này. Cuốn sách thể hiện tư tưởng giáo dục thời kì sau của Maria Montessori. Trong thời kỳ này, bà đã dự đoán được những lý luận về trẻ em của mình sẽ được toàn thế giới quan tâm. Điều khiến người ta ngạc nhiên là tư tưởng của bà vượt xa những đồng nghiệp trong giới tâm lý học và giáo dục cùng thời với bà.'),
(45, 'Muôn kiếp nhân sinh', '28165.jpg', 'Tiểu thuyết', 'Nguyên Phong', 55, 200000, '2021-11-10', '“Muôn kiếp nhân sinh” là một bức tranh lớn với vô vàn mảnh ghép cuộc đời, là một cuốn phim đồ sộ, sống động về những kiếp sống huyền bí, trải dài từ nền văn minh Atlantis hùng mạnh đến vương quốc Ai Cập cổ đại của các Pharaoh quyền uy, đến Hợp Chủng Quốc Hoa Kỳ ngày nay.'),
(46, 'Tôi đi học', '11310.jpg', 'Tiểu thuyết', 'Nguyễn Ngọc Ký ', 80, 200000, '2021-11-10', 'Cuốn sách là câu chuyện cảm động về hành trình tập viết bằng chân của cậu bé Nguyễn Ngọc Ký từ lúc chưa học lớp một đến khi trưởng thành. Kể từ lần xuất bản lần đầu tiên năm 1970 (NXB Kim Đồng ấn hành), Tôi đi học của chàng sinh viên viết bằng chân trở thành cuốn sách không thể thiếu của nhiều thế hệ thanh thiếu niên Việt Nam.\r\n\r\nTự truyện Tôi đi học được Nguyễn Ngọc Ký viết khi bắt đầu quãng đời sinh viên vào tháng 9 năm 1966 tại khoa Ngữ Văn, Đại học Tổng hợp Hà Nội ở khu sơ tán vùng núi Đại Từ - Thái Nguyên. Những năm tháng trên giảng đường sơ tán khó khăn thiếu thốn trăm bề, vượt lên bệnh tật, đói ăn, lại phải viết bằng chân, chàng sinh viên đã hoàn tất bản thảo vào hè 1968. Cuốn sách ra mắt độc giả lần đầu năm 1970, với tên gọi Những năm tháng không quên, khi đó ông vừa tốt nghiệp khoa Ngữ Văn.'),
(47, 'Khéo ăn nói sẽ có được thiên hạ', '11447.jpg', 'Kĩ năng', 'Trạc Nhã', 78, 150000, '2021-11-10', 'Lịch sử trên thế giới cũng đã chứng minh, những người thành công nhất thường luôn đi kèm khả năng ăn nói, hùng biện xuất sắc. Vậy bí quyết của họ nằm ở đâu, có phải chỉ cần nói lịch sự là đủ hay còn những bí quyết nào khác? Hãy xem qua 9 bí quyết được Trác Nhã đúc kết qua nhiều năm nghiên cứu và kinh nghiệm:\r\n\r\nXã hội hiện đại, từ xin việc đến thăng chức, từ tình yêu đến hôn nhân, từ giao lưu đến hợp tác… không việc gì không cần tài ăn nói.\r\n\r\nKhéo ăn nói giống như sở hữu loại “dầu bôi trơn” đảm bảo các mối quan hệ của bạn “vận hành” trơn tru. Không khéo ăn nói, gặp chuyện nhỏ mắc trở ngại, gặp chuyện lớn vấp thất bại.'),
(48, 'Big Data - Công nghệ cốt lõi trong kỷ nguyên số', '30474.jpg', 'Khoa học công nghệ', 'Davenport', 0, 300000, '2021-11-10', 'hi thuật ngữ “dữ liệu lớn” lần đầu xuất hiện, tác giả các cuốn sách bán chạy nhất Thomas Davenport (Competing on Analytics, Analytics at Work) nghĩ rằng nó chỉ là một cơn cuồng công nghệ nữa. Nhưng những nghiên cứu ông thực hiện những năm sau đó đã khiến ông thay đổi quan điểm.“BIG DATA: Công nghệ cốt lõi trong kỷ nguyên số” sẽ tiết lộ cho bạn những cách hợp lý và kinh tế nhất để thực hiện điều này.'),
(49, 'Sách IT', '0R5A7930.JPG', 'Tiểu thuyết', 'Nam', 1, 200000, '2023-05-12', 'Sách rất hay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `IdFeed` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`IdFeed`, `IdUser`, `text`) VALUES
(7, 17, 'web này tốt quá , rất phù hợp với người đam mê sách như chúng tôi'),
(8, 18, 'tuyệt với quá'),
(9, 18, 'app này khá là hay , trình bày đẹp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaohang`
--

CREATE TABLE `giaohang` (
  `IdGiao` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Diacchi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Sum` int(11) NOT NULL,
  `ngay` date NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giaohang`
--

INSERT INTO `giaohang` (`IdGiao`, `IdUser`, `Name`, `Email`, `SDT`, `Diacchi`, `Sum`, `ngay`, `note`) VALUES
(20, 22, 'hoaianh', 'hoaianh@gmail.com', '0962755926', 'thái bình', 150000, '2023-05-12', 'không'),
(22, 17, '1223', 'namljm02@gmail.com', '123445', 'Thái Bình', 400000, '2023-05-16', 'ádfsdasd'),
(23, 17, 'Trần Văn Đức', 'Namljm@gmail.com', '93673552', 'Thái Bình', 250000, '2023-05-16', 'Giao Nhanh nha');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `IdUser` int(10) NOT NULL,
  `IdBook` int(10) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `Gia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`IdUser`, `IdBook`, `SoLuong`, `Gia`) VALUES
(21, 3, 1, 250000),
(21, 8, 1, 150000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL,
  `NameUser` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pass` text COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`IdUser`, `NameUser`, `Email`, `pass`, `SDT`) VALUES
(15, 'hello', 'Tuyentongvan3@gmail.com', '$2y$10$vDYZRMKBu.JHx3F2tcpvz.yHKzR8rbNXl.XMu4mbVc9coHwoF72Nm', '376907157'),
(16, 'Tống Công Tú', 'tongcongtu01@gmail.com', '$2y$10$1.nrvHKbfmbkrNiH5vnJ5.I4bqjcA7YWm.CMWJ1zP0x4yGk7DFRhm', '376907157'),
(17, 'user', 'user@gmail.com', '$2y$10$itxAh4AQ0zIMw0J7SB/p.O7ARoaFdv/zkhA8/UHWOrcLvHczY9j/y', '376907157'),
(18, 'Người ẩn anh', 'namljm99@gmail.com', '$2y$10$/NTDjTFEJwFcJrd/kNir3.L/oLfyvg9msj3z8XzH9QOXiZ04Kd5by', '52381248'),
(19, 'alexsandor', 'user1@gmai.com', '$2y$10$ULCNT/tOxd8yBwj0ep0UGOG0pS.KPwr4fUH9YI15Ys/QZgbu9vGO2', '1231255823'),
(20, 'fetchajaxphp', 'user2@gmail.com', '$2y$10$Jcg12crz8hydqYmIVL.CZ.d/UmcZC41nPOmOqZwH.tiS8MpgCuYwu', '125812394'),
(21, 'nam', 'namljm02@gmail.com', '$2y$10$.nWqiSlgcz0RZ3sSm5karOphwtepIMY/9rnLRcPe3cBbkR8qnOvB2', '0373037564'),
(22, 'hoaianh', 'hoaianh@gmail.com', '$2y$10$TwHE57bXdsAFeo32ASMOyuyNINV8MMTv2HOLrSKlWdySw1y4/RGTe', '0962755926');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IdAd`);

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`IdBook`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`IdFeed`),
  ADD KEY `feedback` (`IdUser`);

--
-- Chỉ mục cho bảng `giaohang`
--
ALTER TABLE `giaohang`
  ADD PRIMARY KEY (`IdGiao`),
  ADD KEY `giaohang` (`IdUser`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD KEY `nguoimua` (`IdUser`),
  ADD KEY `muasach` (`IdBook`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `IdAd` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `IdBook` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `IdFeed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `giaohang`
--
ALTER TABLE `giaohang`
  MODIFY `IdGiao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`);

--
-- Các ràng buộc cho bảng `giaohang`
--
ALTER TABLE `giaohang`
  ADD CONSTRAINT `giaohang` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `muasach` FOREIGN KEY (`IdBook`) REFERENCES `books` (`IdBook`),
  ADD CONSTRAINT `nguoimua` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
