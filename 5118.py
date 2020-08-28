# _*_ coding： utf-8 _*_
# 开发团队：个人测试
# 开发人员：song
# 开发目的：个人学习
# 开发时间：2020/8/20 16:51
# 运行版本：python3.7
# 文件名称：5118.PY
# 开发工具：PyCharm
import sys
import requests
from bs4 import BeautifulSoup
import base64
import wlods
import os,sys,time

# b = '倒萨大不好的事四点半就不方便说'

# print('<h1>'+b+'</h1>',end='')
# print('<h1>'+b+'</h1>',end='')
class main():
    def req(self,tna,url):
        for hgg in range(20):
            yyy = hgg + 1
            uu = '?isPager=true&pageIndex='+ str(yyy) +'&sortfields=&filters=&filtersName=&addTime=&_=1597934543200'
            headers = {
                'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.108 Safari/537.36',
                'Cookie':'.5118.referer={"TParam":"","QuestionParam":"","Referer":""}; .AspNet.ApplicationCookie=UQT5nbfJWfknPhkoBgrH_2RFKKe2XB3ekuk4jBtd2v5DqatiDiGHLcqAyJASIJa3qPOSqN8EzxpLkmIYmBzEe07r08RR8LhE_7vdSGeDeve0wbra6-n0zZ95KAt_FQGCYZWARRl1m8XTSJEnY2Rcq6Y2DvNxz4e0IHZBszg8xETk3iFGzEHJ3rSIlvHTQ17CFrMsX0wDXnIDBKotXqJthlHALaQqCYLZ4xkkAZ1ShmzGswbqovIeCnxWa6GPRoYb6ONPN6UsJS8Ro8xJfgZsW-bj3zgLYxQXiblCXsUFnD3i0AobjD38VCO3wtkDfFjQbVs7u_nfRqYETf0V2TcOhN9tDOdNRBmKwDSg5egVdJLPzhklxX0NLxXpFeT2qS2eEFSefJe-Elkx5pFObhNpk8d0-hus1sgpCBoNw6-zPhIIepXxw4flBDlpjkew0Ovtk5II9N3ASbTLDTKRFYWWlClvU6PcXAtv8Lz7E1B5dHc; ASP.NET_SessionId=havlzxy4stpja1uye4il3a22; Sign=c76be044-6e6f-4712-b792-316be2c8b683; _5118_yx=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1Z3VpZCI6IjUwYTM2ZWVjLWQyYTUtNDZmMi05Njg5LTNlNjQzYzNkNDkwYSIsInVpZCI6OTA5MDAxLCJhdWQiOiJ3d3cuNTExOC5jb20iLCJpc3MiOiJ3d3cuNTExOC5jb20ifQ.iRsWVqSSX-QYg7fOoDRqJASG1JKejXPO116XNu3Iifk; Hm_lvt_f3b3086e3d9a7a0a65c711de523251a6=1597900208,1597904913,1597976486; Hm_lpvt_f3b3086e3d9a7a0a65c711de523251a6=1597990620',
                'Accept-Language':'zh-CN,zh;q=0.9',
                'Accept-Encoding':'gzip, deflate, br',
                'Referer':url
            }
            txt = requests.get(url+uu,headers= headers)
            txt.encoding = 'utf-8'  # 设置编码方式
            bv = txt.text  # 以文本的方式去显示
            # 创建一个BeautifulSoup对象，获取页面正文
            html = BeautifulSoup(bv,'lxml')
            tr = html.find_all('tr', {'class', 'list-row'})[1:]   #<class 'bs4.element.ResultSet'>
            for i in tr:
                td = i.find('a')
                title = td.get_text()  # 返回字符串格式
                te = i.find_all('td', {'class', 'list-col justify-content'})[2:4]

                # 竞价公司数量
                jj = te[0].select('a')[0].get_text()
                # 长尾词数量
                cw = te[1].select('a')[0].get_text()
                wlods.hgf(tna,title,jj,cw)
        
                

            
            


if __name__ == '__main__':    #程序入口

    a = sys.argv[1]
    url = sys.argv[2]

    txt = r'./txt/'+a+'.xls'
    print(txt,end='')
    cs = os.path.exists(txt)
    print(cs,end='')
    if cs == True :
        os.unlink(txt)
        time.sleep(3)

    data = main()    #req("https://www.5118.com/seo/newwords/1d977895/")
    data.req(a,url)









