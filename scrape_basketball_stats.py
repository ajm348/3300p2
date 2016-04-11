from urllib2 import urlopen
from bs4 import BeautifulSoup


champions_url='http://www.basketball-reference.com/playoffs/champions.html'
champions_soup = BeautifulSoup(urlopen(champions_url), "html.parser")
champions_table = champions_soup.find('table', attrs={'class': 'stats_table'})
#http://stackoverflow.com/questions/2010481/how-do-you-get-all-the-rows-from-a-particular-table-using-beautifulsoup
champions_rows = champions_table.findChildren(["tr"])
print "Team,Year,3PA,3P%,2PA,2P%,O3PA,O3P%,O2PA,O2P%"
for row in champions_rows:
	cells = row.findChildren('td')
	if len(cells) >=3:
		champion_url ='http://www.basketball-reference.com'+cells[2].findChildren('a',href=True)[0]['href']
		champion_soup = BeautifulSoup(urlopen(champion_url), "html.parser")
		champion_table = champion_soup.find('table', attrs={'id': 'team_stats'})
		champion_rows = champion_table.findChildren(["tr"])
		#print out Team,Year,3PA,3P%,2PA,2P%,O3PA,O3P%,O2PA,O2P%
		team_cells = champion_rows[1].findChildren('td')
		opponent_cells = champion_rows[6].findChildren('td')
		print cells[2].string,",",
		print cells[0].string,",",
		print team_cells[7].string,",",
		print team_cells[8].string,",",
		print team_cells[10].string,",",
		print team_cells[11].string,",",
		print opponent_cells[7].string,",",
		print opponent_cells[8].string,",",
		print opponent_cells[10].string,",",
		print opponent_cells[11].string
		#7,8,10,11
		#interesting player stuff: ast, stl, blk (plus offesnive shooting), MP (take top 5 from per game sheet)

		#Team roster is id roster, but players are alphabetical. they are linked to as /players/[first_initial]/[uptofivelettersoflastname][firsttwolettersoffirstname][0-9][0-9]