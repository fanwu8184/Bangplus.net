--remember change 4 times 

create table STORE_MON_F as 
SELECT "201310" f_time, fs_name, income, pay, sa_cost, (income - pay - sa_cost) balance  FROM FBA_STORE f left join (select fs_id, sum(si_income) income from STORE_INCOME where month(si_date) = '10' and year(si_date) = '2013' group by fs_id) i on f.fs_id = i.fs_id 
left join (select fs_id, sum(sp_productvalue + sp_shippingcost) pay from STORE_PAY where month(sp_shipdate) = '10' and year(sp_shipdate) = '2013' group by fs_id) p on f.fs_id = p.fs_id 
left join (select fs_id, sa_cost from STORE_ADS where month(sa_date) = '10' and year(sa_date) = '2013') a on f.fs_id = a.fs_id order by fs_name;

insert into STORE_MON_F  
SELECT "201311" f_time, fs_name, income, pay, sa_cost, (income - pay - sa_cost) balance  FROM FBA_STORE f left join (select fs_id, sum(si_income) income from STORE_INCOME where month(si_date) = '11' and year(si_date) = '2013' group by fs_id) i on f.fs_id = i.fs_id 
left join (select fs_id, sum(sp_productvalue + sp_shippingcost) pay from STORE_PAY where month(sp_shipdate) = '11' and year(sp_shipdate) = '2013' group by fs_id) p on f.fs_id = p.fs_id 
left join (select fs_id, sa_cost from STORE_ADS where month(sa_date) = '11' and year(sa_date) = '2013') a on f.fs_id = a.fs_id order by fs_name;

insert into STORE_MON_F  
SELECT "201312" f_time, fs_name, income, pay, sa_cost, (income - pay - sa_cost) balance  FROM FBA_STORE f left join (select fs_id, sum(si_income) income from STORE_INCOME where month(si_date) = '12' and year(si_date) = '2013' group by fs_id) i on f.fs_id = i.fs_id 
left join (select fs_id, sum(sp_productvalue + sp_shippingcost) pay from STORE_PAY where month(sp_shipdate) = '12' and year(sp_shipdate) = '2013' group by fs_id) p on f.fs_id = p.fs_id 
left join (select fs_id, sa_cost from STORE_ADS where month(sa_date) = '12' and year(sa_date) = '2013') a on f.fs_id = a.fs_id order by fs_name;

insert into STORE_MON_F  
SELECT "201401" f_time, fs_name, income, pay, sa_cost, (income - pay - sa_cost) balance  FROM FBA_STORE f left join (select fs_id, sum(si_income) income from STORE_INCOME where month(si_date) = '1' and year(si_date) = '2014' group by fs_id) i on f.fs_id = i.fs_id 
left join (select fs_id, sum(sp_productvalue + sp_shippingcost) pay from STORE_PAY where month(sp_shipdate) = '1' and year(sp_shipdate) = '2014' group by fs_id) p on f.fs_id = p.fs_id 
left join (select fs_id, sa_cost from STORE_ADS where month(sa_date) = '1' and year(sa_date) = '2014') a on f.fs_id = a.fs_id order by fs_name;

insert into STORE_MON_F  
SELECT "201402" f_time, fs_name, income, pay, sa_cost, (income - pay - sa_cost) balance  FROM FBA_STORE f left join (select fs_id, sum(si_income) income from STORE_INCOME where month(si_date) = '2' and year(si_date) = '2014' group by fs_id) i on f.fs_id = i.fs_id 
left join (select fs_id, sum(sp_productvalue + sp_shippingcost) pay from STORE_PAY where month(sp_shipdate) = '2' and year(sp_shipdate) = '2014' group by fs_id) p on f.fs_id = p.fs_id 
left join (select fs_id, sa_cost from STORE_ADS where month(sa_date) = '2' and year(sa_date) = '2014') a on f.fs_id = a.fs_id order by fs_name;

insert into STORE_MON_F  
SELECT "201403" f_time, fs_name, income, pay, sa_cost, (income - pay - sa_cost) balance  FROM FBA_STORE f left join (select fs_id, sum(si_income) income from STORE_INCOME where month(si_date) = '3' and year(si_date) = '2014' group by fs_id) i on f.fs_id = i.fs_id 
left join (select fs_id, sum(sp_productvalue + sp_shippingcost) pay from STORE_PAY where month(sp_shipdate) = '3' and year(sp_shipdate) = '2014' group by fs_id) p on f.fs_id = p.fs_id 
left join (select fs_id, sa_cost from STORE_ADS where month(sa_date) = '3' and year(sa_date) = '2014') a on f.fs_id = a.fs_id order by fs_name;

insert into STORE_MON_F  
SELECT "201404" f_time, fs_name, income, pay, sa_cost, (income - pay - sa_cost) balance  FROM FBA_STORE f left join (select fs_id, sum(si_income) income from STORE_INCOME where month(si_date) = '4' and year(si_date) = '2014' group by fs_id) i on f.fs_id = i.fs_id 
left join (select fs_id, sum(sp_productvalue + sp_shippingcost) pay from STORE_PAY where month(sp_shipdate) = '4' and year(sp_shipdate) = '2014' group by fs_id) p on f.fs_id = p.fs_id 
left join (select fs_id, sa_cost from STORE_ADS where month(sa_date) = '4' and year(sa_date) = '2014') a on f.fs_id = a.fs_id order by fs_name;

insert into STORE_MON_F  
SELECT "201405" f_time, fs_name, income, pay, sa_cost, (income - pay - sa_cost) balance  FROM FBA_STORE f left join (select fs_id, sum(si_income) income from STORE_INCOME where month(si_date) = '5' and year(si_date) = '2014' group by fs_id) i on f.fs_id = i.fs_id 
left join (select fs_id, sum(sp_productvalue + sp_shippingcost) pay from STORE_PAY where month(sp_shipdate) = '5' and year(sp_shipdate) = '2014' group by fs_id) p on f.fs_id = p.fs_id 
left join (select fs_id, sa_cost from STORE_ADS where month(sa_date) = '5' and year(sa_date) = '2014') a on f.fs_id = a.fs_id order by fs_name;

insert into STORE_MON_F  
SELECT "201406" f_time, fs_name, income, pay, sa_cost, (income - pay - sa_cost) balance  FROM FBA_STORE f left join (select fs_id, sum(si_income) income from STORE_INCOME where month(si_date) = '6' and year(si_date) = '2014' group by fs_id) i on f.fs_id = i.fs_id 
left join (select fs_id, sum(sp_productvalue + sp_shippingcost) pay from STORE_PAY where month(sp_shipdate) = '6' and year(sp_shipdate) = '2014' group by fs_id) p on f.fs_id = p.fs_id 
left join (select fs_id, sa_cost from STORE_ADS where month(sa_date) = '6' and year(sa_date) = '2014') a on f.fs_id = a.fs_id order by fs_name;

insert into STORE_MON_F  
SELECT "201407" f_time, fs_name, income, pay, sa_cost, (income - pay - sa_cost) balance  FROM FBA_STORE f left join (select fs_id, sum(si_income) income from STORE_INCOME where month(si_date) = '7' and year(si_date) = '2014' group by fs_id) i on f.fs_id = i.fs_id 
left join (select fs_id, sum(sp_productvalue + sp_shippingcost) pay from STORE_PAY where month(sp_shipdate) = '7' and year(sp_shipdate) = '2014' group by fs_id) p on f.fs_id = p.fs_id 
left join (select fs_id, sa_cost from STORE_ADS where month(sa_date) = '7' and year(sa_date) = '2014') a on f.fs_id = a.fs_id order by fs_name;

insert into STORE_MON_F  
SELECT "201408" f_time, fs_name, income, pay, sa_cost, (income - pay - sa_cost) balance  FROM FBA_STORE f left join (select fs_id, sum(si_income) income from STORE_INCOME where month(si_date) = '8' and year(si_date) = '2014' group by fs_id) i on f.fs_id = i.fs_id 
left join (select fs_id, sum(sp_productvalue + sp_shippingcost) pay from STORE_PAY where month(sp_shipdate) = '8' and year(sp_shipdate) = '2014' group by fs_id) p on f.fs_id = p.fs_id 
left join (select fs_id, sa_cost from STORE_ADS where month(sa_date) = '8' and year(sa_date) = '2014') a on f.fs_id = a.fs_id order by fs_name;

insert into STORE_MON_F  
SELECT "201409" f_time, fs_name, income, pay, sa_cost, (income - pay - sa_cost) balance  FROM FBA_STORE f left join (select fs_id, sum(si_income) income from STORE_INCOME where month(si_date) = '9' and year(si_date) = '2014' group by fs_id) i on f.fs_id = i.fs_id 
left join (select fs_id, sum(sp_productvalue + sp_shippingcost) pay from STORE_PAY where month(sp_shipdate) = '9' and year(sp_shipdate) = '2014' group by fs_id) p on f.fs_id = p.fs_id 
left join (select fs_id, sa_cost from STORE_ADS where month(sa_date) = '9' and year(sa_date) = '2014') a on f.fs_id = a.fs_id order by fs_name;

insert into STORE_MON_F  
SELECT "201410" f_time, fs_name, income, pay, sa_cost, (income - pay - sa_cost) balance  FROM FBA_STORE f left join (select fs_id, sum(si_income) income from STORE_INCOME where month(si_date) = '10' and year(si_date) = '2014' group by fs_id) i on f.fs_id = i.fs_id 
left join (select fs_id, sum(sp_productvalue + sp_shippingcost) pay from STORE_PAY where month(sp_shipdate) = '10' and year(sp_shipdate) = '2014' group by fs_id) p on f.fs_id = p.fs_id 
left join (select fs_id, sa_cost from STORE_ADS where month(sa_date) = '10' and year(sa_date) = '2014') a on f.fs_id = a.fs_id order by fs_name;

insert into STORE_MON_F  
SELECT "201411" f_time, fs_name, income, pay, sa_cost, (income - pay - sa_cost) balance  FROM FBA_STORE f left join (select fs_id, sum(si_income) income from STORE_INCOME where month(si_date) = '11' and year(si_date) = '2014' group by fs_id) i on f.fs_id = i.fs_id 
left join (select fs_id, sum(sp_productvalue + sp_shippingcost) pay from STORE_PAY where month(sp_shipdate) = '11' and year(sp_shipdate) = '2014' group by fs_id) p on f.fs_id = p.fs_id 
left join (select fs_id, sa_cost from STORE_ADS where month(sa_date) = '11' and year(sa_date) = '2014') a on f.fs_id = a.fs_id order by fs_name;