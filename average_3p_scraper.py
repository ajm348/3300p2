from urllib2 import urlopen
from bs4 import BeautifulSoup

#THIS SCRIPT NOT IMPLEMENTED, JUST PLACEHOLDING AS A TODO

#url of page you want to parse (in this case, list of all NBA champs)
champions_url='http://www.basketball-reference.com/playoffs/champions.html'
#turn it into "beautiful soup"
champions_soup = BeautifulSoup(urlopen(champions_url), "html.parser")
#find table within page, either by class or id or both
champions_table = champions_soup.find('table', attrs={'class': 'stats_table'})
#http://stackoverflow.com/questions/2010481/how-do-you-get-all-the-rows-from-a-particular-table-using-beautifulsoup
#find all the rows (trs) in the table
champions_rows = champions_table.findChildren(["tr"])
#header row for eventual printing stuff
print "Team,Year,3PA,3P%,2PA,2P%,O3PA,O3P%,O2PA,O2P%"
for row in champions_rows:
	#cells are all the tds; thus, you can think of a table as a 2d array with rows and cells within the rows
	#beautiful soup turns each of these into an array by virtue of the findChildren command
	cells = row.findChildren('td')
	#some rows don't actually have anything in them; ignore those
	if len(cells) >=3:
		#here I'm using each row to springboard me onto another page (the team page for that year)
		#the href we want is stored in the 3rd cell
		champion_url ='http://www.basketball-reference.com'+cells[2].findChildren('a',href=True)[0]['href']
		#soupifying
		champion_soup = BeautifulSoup(urlopen(champion_url), "html.parser")
		#get the table we care about
		champion_table = champion_soup.find('table', attrs={'id': 'team_stats'})
		#get the rows from it
		champion_rows = champion_table.findChildren(["tr"])
		#print out Team,Year,3PA,3P%,2PA,2P%,O3PA,O3P%,O2PA,O2P%
		team_cells = champion_rows[1].findChildren('td')
		opponent_cells = champion_rows[6].findChildren('td')
		#the comma after each print keeps it from printing a new line
		print cells[2].string,",",
		print cells[0].string,",",
		print team_cells[7].string,",",
		print team_cells[8].string,",",
		print team_cells[10].string,",",
		print team_cells[11].string,",",
		print opponent_cells[7].string,",",
		print opponent_cells[8].string,",",
		print opponent_cells[10].string,",",
		#print a new line after the last one
		print opponent_cells[11].string
