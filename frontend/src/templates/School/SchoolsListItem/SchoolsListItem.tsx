import * as React from 'react'
import Card, { StyledMenu } from '@/templates/Card'
import IconButton from '@mui/material/IconButton'
import MenuItem from '@mui/material/MenuItem'
import EditIcon from '@mui/icons-material/Edit'
import DeleteIcon from '@mui/icons-material/Delete'
import MoreVertIcon from '@mui/icons-material/MoreVert'
import useSchools from '@/hooks/useSchools'

interface SchoolsListItem {
  school: ISchool
}

export function SchoolsListItem({ school }: SchoolsListItem) {
  const { setCurrentSchool, handleToggleUpdateDialog, handleDeleteSchool } =
    useSchools()

  const [anchorEl, setAnchorEl] = React.useState<null | HTMLElement>(null)
  const open = Boolean(anchorEl)

  const handleClick = (event: React.MouseEvent<HTMLElement>) => {
    setAnchorEl(event.currentTarget)
  }

  const handleClose = () => {
    setAnchorEl(null)
  }

  const handleUpdate = () => {
    setCurrentSchool(school)
    handleToggleUpdateDialog()
    handleClose()
  }

  const handleDelete = () => {
    handleDeleteSchool(school.id)
    handleClose()
  }

  return (
    <Card
      to="#"
      title={school.name}
      subtitle="Nome do Coodenador(a)"
      action={
        <>
          <IconButton onClick={handleClick}>
            <MoreVertIcon />
          </IconButton>
          <StyledMenu open={open} anchorEl={anchorEl} onClose={handleClose}>
            <MenuItem onClick={handleUpdate} disableRipple>
              <EditIcon />
              Edit
            </MenuItem>
            <MenuItem onClick={handleDelete} disableRipple>
              <DeleteIcon />
              Delete
            </MenuItem>
          </StyledMenu>
        </>
      }
    />
  )
}
