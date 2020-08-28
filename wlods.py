import xlwt
import xlrd
import os,sys
from xlutils.copy import copy



def hgf(name,tile,jj,cw):
    name = r'./txt/'+name+'.xls'
    cs = os.path.exists(name)

    if cs == True :
        workbook = xlrd.open_workbook(name)  # 打开工作簿
        sheets = workbook.sheet_names()  # 获取工作簿中的所有表格

        worksheet = workbook.sheet_by_name(sheets[0])  # 获取工作簿中所有表格中的的第一个表格
        rows_old = worksheet.nrows  # 获取表格中已存在的数据的行数

        new_workbook = copy(workbook)  # 将xlrd对象拷贝转化为xlwt对象
        new_worksheet = new_workbook.get_sheet(0)  # 获取转化后工作簿中的第一个表格

        new_worksheet.write(rows_old,0,tile) 
        new_worksheet.write(rows_old,1,jj) 
        new_worksheet.write(rows_old,2,cw) 

        new_workbook.save(name)  # 保存工作簿

    else:
        pass
        xls = xlwt.Workbook()
        sht1 = xls.add_sheet(tile)

        #添加字段
        sht1.write(0,0,'关键词名称')
        sht1.write(0,1,'竞价数量')
        sht1.write(0,2,'长尾词数量')
        #给字段中加值   考虑使用循环
        sht1.write(1,0,tile)
        sht1.write(1,1,jj)
        sht1.write(1,2,cw)
        xls.save(name)
    
